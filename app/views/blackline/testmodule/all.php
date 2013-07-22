<?php
$fields = array(
                'id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => '20',
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                                ),
                  'article_id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => '20',
                                                 'null' => TRUE,
                                                 'default' => '0',
                                          ),
                  'filename' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '150',
                                                 'null' => TRUE,
                                                 'default' => '0',
                                          ),
                  'savename' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '150',
                                                 'null' => TRUE,
                                                 'default' => '0',
                                          )
                   
);

$this->dbforge->add_field($fields);
$this->dbforge->add_key('id', TRUE);
$this->dbforge->create_table('article_has_attachments', TRUE); 



$fields = array(
                        'country' => array( 'type' => 'VARCHAR', 'constraint' => '10', 'null' => TRUE, 'default' => '0'),

                        'vat' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE),

                        'note' => array( 'type' => 'LONGTEXT', 'null' => TRUE),
);
$this->dbforge->add_column('companies', $fields);




$fields = array(
                        'vat' => array( 'type' => 'VARCHAR', 'constraint' => '150', 'null' => TRUE, 'default' => '0'),

                        'ticket_email' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE),

                        'ticket_default_owner' => array( 'type' => 'INT', 'constraint' => '10', 'null' => TRUE, 'default' => '0'),

                        'ticket_default_queue' => array( 'type' => 'INT', 'constraint' => '10', 'null' => TRUE, 'default' => '0'),

                        'ticket_default_type' => array( 'type' => 'INT', 'constraint' => '10', 'null' => TRUE, 'default' => '0'),

                        'ticket_default_status' => array( 'type' => 'VARCHAR', 'constraint' => '200', 'null' => TRUE, 'default' => 'new'),

                        'ticket_config_host' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE),

                        'ticket_config_login' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE),

                        'ticket_config_pass' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE),

                        'ticket_config_port' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE),

                        'ticket_config_ssl' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE),

                        'ticket_config_email' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE),

                        'ticket_config_flags' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE, 'default' => '/notls'),

                        'ticket_config_search' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE, 'default' => 'UNSEEN'),

                        'ticket_config_timestamp' => array( 'type' => 'INT', 'constraint' => '11', 'null' => TRUE, 'default' => '0'),

                        'ticket_config_mailbox' => array( 'type' => 'VARCHAR', 'constraint' => '250', 'null' => TRUE, 'default' => 'INBOX'),

                        'ticket_config_delete' => array( 'type' => 'INT', 'constraint' => '11', 'null' => TRUE, 'default' => '0'),

                        'ticket_config_active' => array( 'type' => 'INT', 'constraint' => '11', 'null' => TRUE, 'default' => '0'),

                        'ticket_config_imap' => array( 'type' => 'INT', 'constraint' => '11', 'null' => TRUE, 'default' => '1'),
);
$this->dbforge->add_column('core', $fields); 


$fields = array(
                        'note' => array( 'type' => 'LONGTEXT', 'null' => TRUE),
                   
);
$this->dbforge->add_column('projects', $fields); 




$fields = array(
                'id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => '20',
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                                ),
                  'name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'description' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE
                                          ),
                  'inactive' => array(
                                                 'type' => 'TINYINT',
                                                 'constraint' => '4',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          )
                   
);

$this->dbforge->add_field($fields);
$this->dbforge->add_key('id', TRUE);
$this->dbforge->create_table('queues', TRUE); 



$fields = array(
                'id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => '20',
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                                ),
                  'ticket_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'from' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'reply_to' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'to' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'cc' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'subject' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'message' => array(
                                                 'type' => 'TEXT',
                                                 'null' => TRUE
                                          ),
                  'datetime' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE
                                          ),
                  'internal' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '10',
                                                 'null' => TRUE,
                                                 'default' => '1'
                                          )
                   
);

$this->dbforge->add_field($fields);
$this->dbforge->add_key('id', TRUE);
$this->dbforge->create_table('ticket_has_articles', TRUE); 





$fields = array(
                'id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => '20',
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                                ),
                  'ticket_id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => '20',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'filename' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'savename' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          )
                   
);

$this->dbforge->add_field($fields);
$this->dbforge->add_key('id', TRUE);
$this->dbforge->create_table('ticket_has_attachments', TRUE);



$fields = array(
                'id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => '20',
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                                ),
                  'from' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'reference' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '20',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'type_id' => array(
                                                 'type' => 'SMALLINT',
                                                 'constraint' => '0',
                                                 'null' => TRUE,
                                                 'default' => '1'
                                          ),
                  'lock' => array(
                                                 'type' => 'SMALLINT',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'subject' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'text' => array(
                                                 'type' => 'text',
                                                 'null' => TRUE
                                          ),
                  'status' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '50',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'client_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'company_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'user_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'escalation_time' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'priority' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '50',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'created' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'queue_id' => array(
                                                 'type' => 'INT',
                                                 'constraint' => '11',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'updated' => array(
                                                 'type' => 'TINYINT',
                                                 'constraint' => '4',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  

                   
);

$this->dbforge->add_field($fields);
$this->dbforge->add_key('id', TRUE);
$this->dbforge->create_table('tickets', TRUE);



$fields = array(
                'id' => array(
                                                 'type' => 'BIGINT',
                                                 'constraint' => '20',
                                                 'unsigned' => TRUE,
                                                 'auto_increment' => TRUE
                                                ),
                  'name' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          ),
                  'description' => array(
                                                 'type' => 'VARCHAR',
                                                 'constraint' => '250',
                                                 'null' => TRUE
                                          ),
                  'inactive' => array(
                                                 'type' => 'TINYINT',
                                                 'constraint' => '4',
                                                 'null' => TRUE,
                                                 'default' => '0'
                                          )
                   
);

$this->dbforge->add_field($fields);
$this->dbforge->add_key('id', TRUE);
$this->dbforge->create_table('types', TRUE); 

$attributes = array('name' => 'Tickets', 'link' => 'tickets', 'type' => 'main', 'icon' => 'icon-tag', 'sort' => '8');
$module = Module::create($attributes);

$attributes = array('name' => 'Tickets', 'link' => 'ctickets', 'type' => 'client', 'icon' => 'icon-tag', 'sort' => '4');
$module = Module::create($attributes);

$attributes = array('name' => 'First Level', 'description' => 'First Level Queue', 'inactive' => '0');
$module = Queue::create($attributes);

$attributes = array('name' => 'Service Request', 'description' => 'Service Request Type', 'inactive' => '0');
$module = Type::create($attributes);
