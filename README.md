Slack Bundle
=================

This bundle provides

 - A Guzzle client to access the Slack API
 - A Cli command to monitor a group on an event loop, dispatching events to handle messages received.

This bundle is very much in alpha status

Installation
-------

    composer require 'orukusaki/slackbundle'

Add these lines you your AppKernal::registerBundles

    ...
    new Orukusaki\Bundle\SlackBundle\OrukusakiSlackBundle(),
    new Misd\GuzzleBundle\MisdGuzzleBundle(),
    ...

Add config to config.yml:

    orukusaki_slack:
        api_key: <Your API Key>
        identity:
            username: My Api Bot
            emoji: ":space_indvader:"

Running
=======
  app/console slack:run <group-name>

Adding your own commands
=======
Add an Event Listener which will be triggered every time a message is received.  There are a couple of examples in the services.xml for this bundle:

    <service id="slack.listener.sayhi" class="Orukusaki\Bundle\SlackBundle\Listener\SayHiListener">
        <argument type="service" id="slack.client" />
        <argument type="service" id="slack.identity" />
        <tag name="kernel.event_listener" event="message.recieved" method="handleMessageEvent" />
    </service>

To see what commands you can run against the API, have a look at Resources/config/webservices.xml