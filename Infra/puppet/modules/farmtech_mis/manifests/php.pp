# PHP installation and configuration

class farmtech_mis::php {
  # Install PHP 8.0 and required extensions
  $php_packages = [
    'php',
    'php-cli',
    'php-common',
    'php-fpm',
    'php-mysqlnd',
    'php-xml',
    'php-mbstring',
    'php-curl',
    'php-zip',
    'php-gd',
    'php-bcmath',
    'php-json',
    'php-opcache',
  ]

  package { $php_packages:
    ensure => installed,
  }

  # Configure PHP-FPM
  file { '/etc/php-fpm.d/www.conf':
    ensure  => file,
    content => template('farmtech_mis/php-fpm-www.conf.erb'),
    require => Package['php-fpm'],
    notify  => Service['php-fpm'],
  }

  # Configure PHP.ini
  file { '/etc/php.ini':
    ensure  => file,
    source  => 'puppet:///modules/farmtech_mis/php.ini',
    require => Package['php'],
    notify  => Service['php-fpm'],
  }

  # Start and enable PHP-FPM
  service { 'php-fpm':
    ensure  => running,
    enable  => true,
    require => Package['php-fpm'],
  }
}

