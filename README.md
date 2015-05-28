#artsat-jp-themes

Wordpress-theme for artsat.jp


####install Fabric deploy tool
```pip install -r requirements.txt```

####config key for git repo server with ssh-add

```ssh-add```


##Deploy

```fab deploy```

##Deploy as a user

To login to remote as another user, add -u option with fab command.

fab will use public_ky at '~/.ssh/id_rsa.pub' (fabfile.py) So you will need login as a correct user.

```fab -u <USERNAME> deploy```


##clone (option)
At first in remote, inital install will needs

```fab clone```