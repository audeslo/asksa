<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191127211606 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client ADD img LONGBLOB DEFAULT NULL');
        $this->addSql('ALTER TABLE commandershow ADD reference VARCHAR(255) NOT NULL, DROP etat');
        $this->addSql('ALTER TABLE commandeshow ADD statut SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD img LONGBLOB DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client DROP img');
        $this->addSql('ALTER TABLE commandershow ADD etat SMALLINT NOT NULL, DROP reference');
        $this->addSql('ALTER TABLE commandeshow DROP statut');
        $this->addSql('ALTER TABLE produit DROP img');
    }
}
