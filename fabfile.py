#!/usr/local/bin/python

from fabric.api import env, cd, run, local

env.hosts = ['vps.artsat.jp']
env.user = 'moxuse'
env.key_filename = '~/.ssh/id_rsa.pub'
env.forward_agent = True
#env.shell = "/bin/sh -c"
deploy_path = '/home/moxuse'
repo = 'ssh://moxus@git.codebreak.com/moxus/artsat-jp-themes.git'

def clone():
    with cd(remote_path):
        run('git clone ' + repo)

def prepare_deploy():
    local('git fetch')

def deploy():
    prepare_deploy()
    with cd(deploy_path):
        run('git pull origin mox-master')
