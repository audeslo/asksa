<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191120132857 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commandershow DROP FOREIGN KEY FK_6033335782EA2E54');
        $this->addSql('DROP INDEX IDX_6033335782EA2E54 ON commandershow');
        $this->addSql('ALTER TABLE commandershow CHANGE commande_id commandeshow_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_603333572BA6E032 FOREIGN KEY (commandeshow_id) REFERENCES commandeshow (id)');
        $this->addSql('CREATE INDEX IDX_603333572BA6E032 ON commandershow (commandeshow_id)');
        $this->addSql('ALTER TABLE commandeshow ADD CONSTRAINT FK_7835D7AB2243B88B FOREIGN KEY (showroom_id) REFERENCES showroom (id)');
        $this->addSql('CREATE INDEX IDX_7835D7AB2243B88B ON commandeshow (showroom_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commandershow DROP FOREIGN KEY FK_603333572BA6E032');
        $this->addSql('DROP INDEX IDX_603333572BA6E032 ON commandershow');
        $this->addSql('ALTER TABLE commandershow CHANGE commandeshow_id commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_6033335782EA2E54 FOREIGN KEY (commande_id) REFERENCES commandeshow (id)');
        $this->addSql('CREATE INDEX IDX_6033335782EA2E54 ON commandershow (commande_id)');
        $this->addSql('ALTER TABLE commandeshow DROP FOREIGN KEY FK_7835D7AB2243B88B');
        $this->addSql('DROP INDEX IDX_7835D7AB2243B88B ON commandeshow');
    }
}
