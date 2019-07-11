<?php
if (!extension_loaded("openssl")) {
  exit("OpenSSL Extension Not Loaded! OpenSSL PHP Extension is required by PAYDUNYA PHP API Client to function properly.");
}

if (!extension_loaded("curl")) {
  exit("Curl Extension Not Loaded! Curl PHP Extension is required by PAYDUNYA PHP API Client to function properly.");
}