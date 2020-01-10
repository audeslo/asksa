<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109224528 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE venteshowroom DROP FOREIGN KEY FK_356D39D2F347EFB');
        $this->addSql('DROP INDEX IDX_356D39D2F347EFB ON venteshowroom');
        $this->addSql('ALTER TABLE venteshowroom DROP produit_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE venteshowroom ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE venteshowroom ADD CONSTRAINT FK_356D39D2F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_356D39D2F347EFB ON venteshowroom (produit_id)');
    }
}
