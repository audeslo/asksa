<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200108102458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tarifcategorieclt ADD capacite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tarifcategorieclt ADD CONSTRAINT FK_E1ACC3577C79189D FOREIGN KEY (capacite_id) REFERENCES capacite (id)');
        $this->addSql('CREATE INDEX IDX_E1ACC3577C79189D ON tarifcategorieclt (capacite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tarifcategorieclt DROP FOREIGN KEY FK_E1ACC3577C79189D');
        $this->addSql('DROP INDEX IDX_E1ACC3577C79189D ON tarifcategorieclt');
        $this->addSql('ALTER TABLE tarifcategorieclt DROP capacite_id');
    }
}
