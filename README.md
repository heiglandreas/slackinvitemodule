# Slack-Invite Module

A ZendFramework-Module to create invites to a slack-team

## Installation

This module is best installed using [composer](https://getcomposer.org)

```composer require org_heigl/slackinvitemodule```

## Configuration

After installation you need to copy the provided file 
```config/module.slackinvite.local.php.dist``` to your configuration folder, 
remove the ```dist```-part and fill out the informations.

The ```apiToken``` can be requested at [Slacks API-Site](https://api.slack.com/docs/oauth-test-tokens) and the 
```teamName``` is (obviously) the name of your team you want to invite people to.

The default routes configured are ```/slack/invite``` to call the invite-form and
```/slack``` to redirect users to your slack-team. Of course you can add 
additional routes.

