<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<< HEAD:src/Migrations/Version20191217200806.php
final class Version20191217200806 extends AbstractMigration
=======
final class Version20191214210803 extends AbstractMigration
>>>>>>> 984974c822163f6c42b58703487468a34256823f:src/Migrations/Version20191214210803.php
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

<<<<<<< HEAD:src/Migrations/Version20191217200806.php
        $this->addSql('ALTER TABLE produit CHANGE prixventeconseiller prixventeconseiller INT NOT NULL');
=======
        $this->addSql('ALTER TABLE produit DROP marque');
>>>>>>> 984974c822163f6c42b58703487468a34256823f:src/Migrations/Version20191214210803.php
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

<<<<<<< HEAD:src/Migrations/Version20191217200806.php
        $this->addSql('ALTER TABLE produit CHANGE prixventeconseiller prixventeconseiller VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
=======
        $this->addSql('ALTER TABLE produit ADD marque VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
>>>>>>> 984974c822163f6c42b58703487468a34256823f:src/Migrations/Version20191214210803.php
    }
}
