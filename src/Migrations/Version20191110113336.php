<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191110113336 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27555BB088');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2766D56301');
        $this->addSql('DROP INDEX IDX_29A5EC2766D56301 ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC27555BB088 ON produit');
        $this->addSql('ALTER TABLE produit ADD created_by_id VARCHAR(255) DEFAULT NULL, ADD edited_by_id VARCHAR(255) DEFAULT NULL, DROP created_by_id_id, DROP edited_by_id_id, CHANGE created_on created_on VARCHAR(255) DEFAULT NULL, CHANGE edited_on edited_on VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit ADD created_by_id_id INT NOT NULL, ADD edited_by_id_id INT NOT NULL, DROP created_by_id, DROP edited_by_id, CHANGE created_on created_on DATETIME NOT NULL, CHANGE edited_on edited_on DATETIME NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27555BB088 FOREIGN KEY (created_by_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2766D56301 FOREIGN KEY (edited_by_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC2766D56301 ON produit (edited_by_id_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27555BB088 ON produit (created_by_id_id)');
    }
}
