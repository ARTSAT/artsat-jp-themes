#!/usr/local/bin/python

from fabric.api import sudo, env, cd, run, local

env.user = 'moxuse'
env.key_filename = '~/.ssh/id_rsa.pub'
env.forward_agent = True
#env.shell = "/bin/sh -c"
deploy_path = '/var/www/artsat.jp/wp-content/themes'
repo = 'ssh://moxus@git.codebreak.com/moxus/artsat-jp-themes.git'

def prepare_deploy():
    local('git fetch')

def deploy():
    prepare_deploy()
    with cd(deploy_path):
        sudo('git pull mox-origin master')
