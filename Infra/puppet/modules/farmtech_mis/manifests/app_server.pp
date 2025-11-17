# Configuration for Laravel application server

class farmtech_mis::app_server {
  include farmtech_mis::base
  include farmtech_mis::php
  include farmtech_mis::nginx
  include farmtech_mis::composer
  include farmtech_mis::laravel_app
  include farmtech_mis::mysql_client

  # Install Node.js and npm for frontend assets
  class { 'farmtech_mis::nodejs':
    version => '18',
  }
}

