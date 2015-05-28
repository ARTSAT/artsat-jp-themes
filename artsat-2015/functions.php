<?php
/**
 * @package Origin
 * @subpackage Functions
 * @version 0.3.5
 * @author DevPress
 * @link http://devpress.com
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

/* Load the core theme framework. */
require_once( trailingslashit( TEMPLATEPATH ) . 'library/hybrid.php' );
$theme = new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'origin_theme_setup' );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 */
function origin_theme_setup() {

    /* Get action/filter hook prefix. */
    $prefix = hybrid_get_prefix();

    /* Add theme support for core framework features. */
    add_theme_support( 'hybrid-core-menus', array( 'primary' ) );
    add_theme_support( 'hybrid-core-sidebars', array( 'primary', 'subsidiary', 'after-singular' ) );
    add_theme_support( 'hybrid-core-widgets' );
    add_theme_support( 'hybrid-core-theme-settings', array( 'footer', 'about' ) );
    add_theme_support( 'hybrid-core-meta-box-footer' );
    add_theme_support( 'hybrid-core-shortcodes' );
    add_theme_support( 'hybrid-core-drop-downs' );
    add_theme_support( 'hybrid-core-template-hierarchy' );

    /* Add theme support for framework extensions. */
    add_theme_support( 'loop-pagination' );
    add_theme_support( 'get-the-image' );
    add_theme_support( 'cleaner-gallery' );
    add_theme_support( 'breadcrumb-trail' );

    /* Add theme support for WordPress features. */
    add_theme_support( 'automatic-feed-links' );

    /* Embed width/height defaults. */
    add_filter( 'embed_defaults', 'origin_embed_defaults' );

    /* Filter the sidebar widgets. */
    add_filter( 'sidebars_widgets', 'origin_disable_sidebars' );

    /* Image sizes */
    add_action( 'init', 'origin_image_sizes' );

    /* Excerpt ending */
    add_filter( 'excerpt_more', 'origin_excerpt_more' );

    /* Custom excerpt length */
    add_filter( 'excerpt_length', 'origin_excerpt_length' );

    /* Filter the pagination trail arguments. */
    add_filter( 'loop_pagination_args', 'origin_pagination_args' );

    /* Remove links from entry titles (shortcodes) for singular */
    add_filter( "{$prefix}_entry_title", 'origin_entry_title_shortcode' );

    /* Filter the comments arguments */
    add_filter( "{$prefix}_list_comments_args", 'origin_comments_args' );

    /* Filter the commentform arguments */
    add_filter( 'comment_form_defaults', 'origin_commentform_args', 11, 1 );

    /* Enqueue scripts (and related stylesheets) */
    add_action( 'wp_enqueue_scripts', 'origin_scripts' );

    /* Enqueue Google fonts */
    add_action( 'wp_enqueue_scripts', 'origin_google_fonts' );

    /* Style settings */
    add_action( 'wp_head', 'origin_style_settings' );

    /* Add the breadcrumb trail just after the container is open. */
    add_action( "{$prefix}_close_header", 'breadcrumb_trail' );

    /* Breadcrumb trail arguments. */
    add_filter( 'breadcrumb_trail_args', 'origin_breadcrumb_trail_args' );

    /* Add support for custom backgrounds */
    add_theme_support( 'custom-background' );

    /* Add theme settings */
    if ( is_admin() )
        require_once( trailingslashit( TEMPLATEPATH ) . 'admin/functions-admin.php' );

    /* Default footer settings */
    add_filter( "{$prefix}_default_theme_settings", 'origin_default_footer_settings' );

}

/**
 * Disables sidebars if viewing a one-column page.
 *
 */
function origin_disable_sidebars( $sidebars_widgets ) {

    global $wp_query;

    if ( is_page_template( 'page-template-fullwidth.php' ) ) {
        $sidebars_widgets['primary'] = false;
    }

    return $sidebars_widgets;
}

/**
 * Overwrites the default widths for embeds.  This is especially useful for making sure videos properly
 * expand the full width on video pages.  This function overwrites what the $content_width variable handles
 * with context-based widths.
 *
 */
function origin_embed_defaults( $args ) {

    $args['width'] = 640;

    if ( is_page_template( 'page-template-fullwidth.php' ) )
        $args['width'] = 940;

    return $args;
}

/**
 * Excerpt ending
 *
 */
function origin_excerpt_more( $more ) {
    return '...';
}

/**
 *  Custom excerpt lengths
 *
 */
function origin_excerpt_length( $length ) {
    return 40;
}

/**
 * Enqueue scripts (and related stylesheets)
 *
 */
function origin_scripts() {

    if ( !is_admin() ) {

        /* Enqueue Scripts */

        wp_register_script( 'origin_fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.pack.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'origin_fancybox' );

        wp_register_script( 'origin_fitvids', get_template_directory_uri() . '/js/fitvids/jquery.fitvids.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'origin_fitvids' );

        wp_register_script( 'origin_footer-scripts', get_template_directory_uri() . '/js/footer-scripts.js', array( 'jquery', 'origin_fitvids', 'origin_fancybox' ), '1.0', true );
        wp_enqueue_script( 'origin_footer-scripts' );

        wp_register_script( 'origin_common-scripts', get_template_directory_uri() . '/assets/js/common.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'origin_common-scripts' );

        /* Enqueue Styles */
        wp_enqueue_style( 'origin_fancybox-stylesheet', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.css', false, 1.0, 'screen' );
    }
}

/**
 * Pagination args
 *
 */
function origin_pagination_args( $args ) {

    $args['prev_text'] = __( '&larr; Previous', 'origin' );
    $args['next_text'] = __( 'Next &rarr;', 'origin' );

    return $args;
}


/**
 * Remove links from entry titles (shortcodes)
 *
 */
function origin_entry_title_shortcode( $title ) {

    global $post;

    if ( is_front_page() && !is_home() )
        $title = the_title( '<h2 class="' . esc_attr( $post->post_type ) . '-title entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>', false );

    elseif ( is_singular() )
        $title = the_title( '<h1 class="' . esc_attr( $post->post_type ) . '-title entry-title">', '</h1>', false );

    elseif ( 'link_category' == get_query_var( 'taxonomy' ) )
        $title = false;

    else
        $title = the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>', false );

    /* If there's no post title, return a clickable '(Untitled)'. */
    if ( empty( $title ) && !is_singular() && 'link_category' !== get_query_var( 'taxonomy' ) )
        $title = '<h2 class="entry-title no-entry-title"><a href="' . get_permalink() . '" rel="bookmark">' . __( '(Untitled)', 'origin' ) . '</a></h2>';

    return $title;
}

/**
 *  Image sizes
 *
 */
function origin_image_sizes() {
    add_image_size( 'single-thumbnail', 636, 310, true );
    add_image_size( 'works-thumbnail', 90, 90, true );
}

/**
 *  Unregister Hybrid widgets
 *
 */
function origin_unregister_widgets() {

    unregister_widget( 'Hybrid_Widget_Search' );
    register_widget( 'WP_Widget_Search' );
}

/**
 * Custom comments arguments
 *
 */
function origin_comments_args( $args ) {

    $args['avatar_size'] = 50;
    return $args;
}

/**
 *  Custom comment form arguments
 *
 */
function origin_commentform_args( $args ) {

    global $user_identity;

    /* Get the current commenter. */
    $commenter = wp_get_current_commenter();

    /* Create the required <span> and <input> element class. */
    $req = ( ( get_option( 'require_name_email' ) ) ? ' <span class="required">' . __( '*', 'origin' ) . '</span> ' : '' );
    $input_class = ( ( get_option( 'require_name_email' ) ) ? ' req' : '' );


    $fields = array(
        'author' => '<p class="form-author' . $input_class . '"><input type="text" class="text-input" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="40" /><label for="author">' . __( 'Name', 'origin' ) . $req . '</label></p>',
        'email' => '<p class="form-email' . $input_class . '"><input type="text" class="text-input" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="40" /><label for="email">' . __( 'Email', 'origin' ) . $req . '</label></p>',
        'url' => '<p class="form-url"><input type="text" class="text-input" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="40" /><label for="url">' . __( 'Website', 'origin' ) . '</label></p>'
    );

    $args = array(
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field' => '<p class="form-textarea req"><!--<label for="comment">' . __( 'Comment', 'origin' ) . '</label>--><textarea name="comment" id="comment" cols="60" rows="10"></textarea></p>',
        'must_log_in' => '<p class="alert">' . sprintf( __( 'You must be <a href="%1$s" title="Log in">logged in</a> to post a comment.', 'origin' ), wp_login_url( get_permalink() ) ) . '</p><!-- .alert -->',
        'logged_in_as' => '<p class="log-in-out">' . sprintf( __( 'Logged in as <a href="%1$s" title="%2$s">%2$s</a>.', 'origin' ), admin_url( 'profile.php' ), esc_attr( $user_identity ) ) . ' <a href="' . wp_logout_url( get_permalink() ) . '" title="' . esc_attr__( 'Log out of this account', 'origin' ) . '">' . __( 'Log out &rarr;', 'origin' ) . '</a></p><!-- .log-in-out -->',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'id_form' => 'commentform',
        'id_submit' => 'submit',
        'title_reply' => __( 'Leave a Reply', 'origin' ),
        'title_reply_to' => __( 'Leave a Reply to %s', 'origin' ),
        'cancel_reply_link' => __( 'Click here to cancel reply.', 'origin' ),
        'label_submit' => __( 'Post Comment &rarr;', 'origin' ),
    );

    return $args;
}

/**
 * Breadcrumb trail arguments.
 *
 */
function origin_breadcrumb_trail_args( $args ) {

    $args['before'] = '';
    $args['separator'] = '&raquo;';
    $args['front_page'] = false;

    return $args;
}

/**
 * Default footer settings
 *
 */
function origin_default_footer_settings( $settings ) {

    $settings['footer_insert'] = '<p class="copyright">' . __( 'Copyright &#169; [the-year] [site-link]', 'origin' ) . '</p>' . "\n\n" . '<p class="credit">' . __( 'Powered by [wp-link] and [theme-link]', 'origin' ) . '</p>';

    return $settings;
}

/**
 * Google fonts
 *
 */
function origin_google_fonts() {

    if ( hybrid_get_setting( 'origin_font_family' ) ) {

        switch ( hybrid_get_setting( 'origin_font_family' ) ) {
            case 'Bitter':
                wp_enqueue_style( 'font-bitter', 'http://fonts.googleapis.com/css?family=Bitter', false, 1.0, 'screen' );
                break;
            case 'Droid Serif':
                wp_enqueue_style( 'font-droid-serif', 'http://fonts.googleapis.com/css?family=Droid+Serif', false, 1.0, 'screen' );
                break;
            case 'Istok Web':
                wp_enqueue_style( 'font-istok-web', 'http://fonts.googleapis.com/css?family=Istok+Web', false, 1.0, 'screen' );
                break;
            case 'Droid Sans':
                wp_enqueue_style( 'font-droid-sans', 'http://fonts.googleapis.com/css?family=Droid+Sans', false, 1.0, 'screen' );
                break;
        }
    } else {
        wp_enqueue_style( 'font-bitter', 'http://fonts.googleapis.com/css?family=Bitter', false, 1.0, 'screen' );
    }
}

/**
 * Style settings
 *
 */
function origin_style_settings() {

    echo "\n<!-- Style settings -->\n";
    echo "<style type=\"text/css\" media=\"all\">\n";

    if ( hybrid_get_setting( 'origin_font_size' ) )
        echo 'html { font-size: ' . hybrid_get_setting( 'origin_font_size' ) . "px; }\n";

    if ( hybrid_get_setting( 'origin_font_family' ) )
        echo 'body { font-family: ' . hybrid_get_setting( 'origin_font_family' ) . ", serif; }\n";

    if ( hybrid_get_setting( 'origin_link_color' ) ) {
        echo 'a, a:visited, #footer a:hover, .entry-title a:hover { color: ' . hybrid_get_setting( 'origin_link_color' ) . "; }\n";
        echo '#respond #submit, .button, a.button, .wpcf7-submit, #loginform .button-primary { background-color: ' . hybrid_get_setting( 'origin_link_color' ) . "; }\n";
        echo "a:hover, a:focus { color: #000; }\n";
    }
    if ( hybrid_get_setting( 'origin_custom_css' ) )
        echo hybrid_get_setting( 'origin_custom_css' ) . "\n";

    echo "</style>\n";

}

/**
 * Origin site title.
 *
 */
function origin_site_title() {

    if ( hybrid_get_setting( 'origin_logo_url' ) ) {

        $tag = ( is_front_page() ) ? 'h1' : 'div';

        echo '<' . $tag . ' id="site-title">' . "\n";
        echo '<a href="' . get_home_url() . '" title="' . get_bloginfo( 'name' ) . '" rel="Home">' . "\n";
        echo '<img class="logo" src="' . esc_url( hybrid_get_setting( 'origin_logo_url' ) ) . '" alt="' . get_bloginfo( 'name' ) . '" />' . "\n";
        echo '</a>' . "\n";
        echo '</' . $tag . '>' . "\n";

    } else {

        hybrid_site_title();

    }
}


//////////////////////////  カスタム投稿の月別アーカイヴ　　//////////////////////////

function my_custom_post_type_archive_where( $where, $args ){
    $post_type  = isset( $args['post_type'] ) ? $args['post_type'] : 'post';
    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";
    return $where;
}
add_filter( 'getarchives_where', 'my_custom_post_type_archive_where', 10, 2 );


//////////////////////////  Blogのカスタム投稿　　//////////////////////////

add_action('init', 'blog_init');
function blog_init()
{
    $labels = array(
        'name' => _x('Blog', 'post type general name'),
        'singular_name' => _x('blog', 'post type singular name'),
        'add_new' => _x('新しくblog記事を書く', 'blog'),
        'add_new_item' => __('blogを書く'),
        'edit_item' => __('blogを編集'),
        'new_item' => __('新しいblog'),
        'view_item' => __('blogを見る'),
        'search_items' => __('blogを探す'),
        'not_found' =>  __('blogはありません'),
        'not_found_in_trash' => __('ゴミ箱にblogはありません'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title','editor','thumbnail','custom-fields','excerpt','author','trackbacks','comments','revisions','page-attributes'),
        'has_archive' => true
    );
    register_post_type('blog',$args);
}

//投稿時のメッセージとか
add_filter('post_updated_messages', 'blog_book_updated_messages');
function blog_book_updated_messages( $messages ) {

    $messages['blog'] = array(
        0 => '', // ここは使用しません
        1 => sprintf( __('blogを更新しました <a href="%s">記事を見る</a>'), esc_url( get_permalink($post_ID) ) ),
        2 => __('blogを更新しました'),
        3 => __('blogを削除しました'),
        4 => __('blog更新'),
        5 => isset($_GET['revision']) ? sprintf( __(' %s 前にblogを保存しました'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('blogが公開されました <a href="%s">記事を見る</a>'), esc_url( get_permalink($post_ID) ) ),
        7 => __('blogを保存'),
        8 => sprintf( __('blogを送信 <a target="_blank" href="%s">プレビュー</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('blogを予約投稿しました: <strong>%1$s</strong>. <a target="_blank" href="%2$s">プレビュー</a>'),
            date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __('blogの下書きを更新しました <a target="_blank" href="%s">プレビュー</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );

    return $messages;
}

//追加したカスタム投稿タイプの投稿ページ上部にあるプルダウンするヘルプ内テキスト
add_action( 'contextual_help', 'blog_add_help_text', 10, 3 );

function blog_add_help_text($contextual_help, $screen_id, $screen) {

    if ('blog' == $screen->id ) {
        $contextual_help =
            '<p>' . __('blog記述のヘルプ') . '</p>' .
            '<ul>' .
            '<li>' . __('は') . '</li>' .
            '<li>' . __('とりあえずあとで') . '</li>' .
            '</ul>' .
            '<p>' . __('書きます:') . '</p>' .
            '<ul>' .
            '<li>' . __('ので') . '</li>' .
            '<li>' . __('とりあえず保留') . '</li>' .
            '</ul>' .
            '<p><strong>' . __('解決しないときは:') . '</strong></p>' .
            '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">ドキュメント</a>') . '</p>' .
            '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">フォーラム</a>') . '</p>' ;
    } elseif ( 'edit-book' == $screen->id ) {
        $contextual_help =
            '<p>' . __('します') . '</p>' ;
    }
    return $contextual_help;
}


//////////////////////////  Educationのカスタム投稿　　//////////////////////////

add_action('init', 'education_init');
function education_init()
{
    $labels = array(
        'name' => _x('Education', 'post type general name'),
        'singular_name' => _x('education', 'post type singular name'),
        'add_new' => _x('新しくeducationの記事を書く', 'education'),
        'add_new_item' => __('educationの記事を書く'),
        'edit_item' => __('educationの記事を編集'),
        'new_item' => __('新しいeducationの記事'),
        'view_item' => __('educationの記事を見る'),
        'search_items' => __('educationの記事を探す'),
        'not_found' =>  __('educationの記事はありません'),
        'not_found_in_trash' => __('ゴミ箱にeducationの記事はありません'),
        'parent_item_colon' => ''
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title','editor','thumbnail','custom-fields','excerpt','author','trackbacks','comments','revisions','page-attributes'),
        'has_archive' => true
    );
    register_post_type('education',$args);
}

//投稿時のメッセージとか
add_filter('post_updated_messages', 'education_book_updated_messages');
function education_book_updated_messages( $messages ) {

    $messages['education'] = array(
        0 => '', // ここは使用しません
        1 => sprintf( __('educationの記事を更新しました <a href="%s">記事を見る</a>'), esc_url( get_permalink($post_ID) ) ),
        2 => __('educationの記事を更新しました'),
        3 => __('educationの記事を削除しました'),
        4 => __('educationの記事更新'),
        5 => isset($_GET['revision']) ? sprintf( __(' %s 前にeducationの記事を保存しました'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('educationの記事が公開されました <a href="%s">記事を見る</a>'), esc_url( get_permalink($post_ID) ) ),
        7 => __('educationの記事を保存'),
        8 => sprintf( __('educationの記事を送信 <a target="_blank" href="%s">プレビュー</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('educationの記事を予約投稿しました: <strong>%1$s</strong>. <a target="_blank" href="%2$s">プレビュー</a>'),
            date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __('educationの記事の下書きを更新しました <a target="_blank" href="%s">プレビュー</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );

    return $messages;
}

//追加したカスタム投稿タイプの投稿ページ上部にあるプルダウンするヘルプ内テキスト
add_action( 'contextual_help', 'education_add_help_text', 10, 3 );

function education_add_help_text($contextual_help, $screen_id, $screen) {

    if ('education' == $screen->id ) {
        $contextual_help =
            '<p>' . __('educationの記事記述のヘルプ') . '</p>' .
            '<ul>' .
            '<li>' . __('は') . '</li>' .
            '<li>' . __('とりあえずあとで') . '</li>' .
            '</ul>' .
            '<p>' . __('書きます:') . '</p>' .
            '<ul>' .
            '<li>' . __('ので') . '</li>' .
            '<li>' . __('とりあえず保留') . '</li>' .
            '</ul>' .
            '<p><strong>' . __('解決しないときは:') . '</strong></p>' .
            '<p>' . __('<a href="http://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">ドキュメント</a>') . '</p>' .
            '<p>' . __('<a href="http://wordpress.org/support/" target="_blank">フォーラム</a>') . '</p>' ;
    } elseif ( 'edit-book' == $screen->id ) {
        $contextual_help =
            '<p>' . __('します') . '</p>' ;
    }
    return $contextual_help;
}


/**
 * 表示設定ページに新着と更新の表示期間（日数）の設定項目を追加する
 */
function add_days_items() {
    add_settings_field( 'new_days', '新着期間設定', 'display_new_days_field', 'reading' );
    add_settings_field( 'modified_days', '更新期間設定', 'display_modified_days_field', 'reading' );
}
add_action( 'admin_init', 'add_days_items' );

/**
 * 設定で保存できる項目に、新着表示日数と更新表示日数を追加する
 *
 * @param array $whitelist_options.
 * @return array filtered whitelist options
 **/
function allow_new_and_modified_post_data( $whitelist_options ) {
    $whitelist_options['reading'][] = 'new_days';
    $whitelist_options['reading'][] = 'modified_days';
    return $whitelist_options;
}
add_filter( 'whitelist_options', 'allow_new_and_modified_post_data' );

/**
 * 表示設定画面に新着表示日数の設定項目を表示する
 */
function display_new_days_field() {
    $new_days = absint( get_option( 'new_days', 7 ) );
    ?>
    <input type="text" name="new_days" id="new_days" size="1" value="<?php echo esc_attr( $new_days ); ?>" />
    日間<span class="description">（1日間だと本日のみ、1週間にするには7日間としてください。）</span>
<?php
}

/**
 * 表示設定画面に更新表示日数の設定項目を表示する
 */
function display_modified_days_field() {
    $modified_days = absint( get_option( 'modified_days', 7 ) );
    ?>
    <input type="text" name="modified_days" id="modified_days" size="1" value="<?php echo esc_attr( $modified_days ); ?>" />
    日間<span class="description">（1日間だと本日のみ、1週間にするには7日間としてください。）</span>
<?php
}









function is_new_post( $post_date = '', $days = 0 ) {
    global $post;
    if ( ! $post_date ) {
        $post_date = $post->post_date;
    }
    if ( ! $days ) {
        $days = absint( get_option( 'new_days', 7 ) );
    }
    return is_widthin_days( $post_date, $days );
}

add_theme_support('post-thumbnails');

add_filter( 'show_admin_bar', '__return_false' );
remove_filter( 'the_content', 'wpautop' );



function is_parent_slug() {
    global $post;
    if ($post->post_parent) {
        $post_data = get_post($post->post_parent);
        return $post_data->post_name;
    }
}

