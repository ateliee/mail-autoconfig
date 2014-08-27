<?php

$HOST = $_SERVER["HTTP_HOST"];
$DOMAIN = $_SERVER["HTTP_HOST"];
$DISPLAY_NAME = $_SERVER["HTTP_HOST"];
$DISPLAY_SHORT_NAME = $_SERVER["HTTP_HOST"];

$INCOMING_SERVER = 'pop3';      // pop3 or imap
$INCOMING_HOST = $_SERVER["HTTP_HOST"];
$INCOMING_PORT = 110;
$INCOMING_SOCKET = 'plain';     // plain or SSL or STARTTLS
$INCOMING_USERNAME = '%EMAILLOCALPART%'.'@'.$_SERVER["HTTP_HOST"];        // %EMAILLOCALPART% or other
$OUTGOING_SERVER = 'smtp';
$OUTGOING_HOST = $_SERVER["HTTP_HOST"];
$OUTGOING_PORT = 587;
$OUTGOING_SOCKET = 'plain';     // plain or SSL or STARTTLS
$OUTGOING_USERNAME = '%EMAILLOCALPART%'.'@'.$_SERVER["HTTP_HOST"];        // %EMAILLOCALPART% or other

$output = <<< EOM
<?xml version="1.0" encoding="UTF-8"?>

<clientConfig version="1.1">
  <emailProvider id="$HOST">
    <domain>$DOMAIN</domain>
    <displayName>$DISPLAY_NAME</displayName>
    <displayShortName>$DISPLAY_SHORT_NAME</displayShortName>
    <incomingServer type="$INCOMING_SERVER">
      <hostname>$INCOMING_HOST</hostname>
      <port>$INCOMING_PORT</port>
      <socketType>$INCOMING_SOCKET</socketType>
      <authentication>plain</authentication>
      <username>$INCOMING_USERNAME</username>
    </incomingServer>
    <outgoingServer type="$OUTGOING_SERVER">
      <hostname>$OUTGOING_HOST</hostname>
      <port>$OUTGOING_PORT</port>
      <socketType>$OUTGOING_SOCKET</socketType>
      <authentication>plain</authentication>
      <username>$OUTGOING_USERNAME</username>
    </outgoingServer>
  </emailProvider>
</clientConfig>
EOM;

header("Content-Type: text/xml");
print $output;
exit;