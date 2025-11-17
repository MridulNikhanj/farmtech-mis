# MySQL client installation

class farmtech_mis::mysql_client {
  # Install MySQL client
  package { 'mysql':
    ensure => installed,
  }
}

