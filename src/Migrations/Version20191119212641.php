<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191119212641 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commandeshow (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, intituleshow VARCHAR(255) NOT NULL, datecomshow DATE NOT NULL, reference VARCHAR(255) DEFAULT NULL, fournisseurshow VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME DEFAULT NULL, credited_on DATETIME DEFAULT NULL, INDEX IDX_7835D7ABDD7B2EBC (edited_by_id), INDEX IDX_7835D7ABB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE showroom (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, nomshow VARCHAR(255) NOT NULL, quartier VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, representant VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME DEFAULT NULL, created_on DATETIME NOT NULL, INDEX IDX_1E2F444FDD7B2EBC (edited_by_id), INDEX IDX_1E2F444FB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandershow (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, commande_id INT DEFAULT NULL, capacitecartonshow INT NOT NULL, capacitebidonshow INT NOT NULL, quantitecommandeshow INT NOT NULL, quantitestock INT NOT NULL, etat SMALLINT NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME NOT NULL, created_on DATETIME NOT NULL, INDEX IDX_60333357DD7B2EBC (edited_by_id), INDEX IDX_60333357B03A8386 (created_by_id), INDEX IDX_60333357F347EFB (produit_id), INDEX IDX_6033335782EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commandeshow ADD CONSTRAINT FK_7835D7ABDD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandeshow ADD CONSTRAINT FK_7835D7ABB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE showroom ADD CONSTRAINT FK_1E2F444FDD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE showroom ADD CONSTRAINT FK_1E2F444FB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_60333357DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_60333357B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_60333357F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_6033335782EA2E54 FOREIGN KEY (commande_id) REFERENCES commandeshow (id)');
        $this->addSql('ALTER TABLE client ADD identifiant1 VARCHAR(255) DEFAULT NULL, ADD identifiant2 VARCHAR(255) DEFAULT NULL, DROP nom, DROP prenom, DROP raisonsociale, DROP ifu, CHANGE referent referent VARCHAR(255) DEFAULT NULL, CHANGE society society VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE reference reference VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tarifcategorieclt ADD litre VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD mail VARCHAR(255) NOT NULL, ADD telephone VARCHAR(255) NOT NULL, ADD mdp VARCHAR(255) NOT NULL, ADD mdpconfirm VARCHAR(255) NOT NULL, ADD slug VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commandershow DROP FOREIGN KEY FK_6033335782EA2E54');
        $this->addSql('DROP TABLE commandeshow');
        $this->addSql('DROP TABLE showroom');
        $this->addSql('DROP TABLE commandershow');
        $this->addSql('ALTER TABLE client ADD nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD raisonsociale VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD ifu VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP identifiant1, DROP identifiant2, CHANGE referent referent VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE society society VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE produit CHANGE reference reference VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tarifcategorieclt DROP litre');
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom, DROP mail, DROP telephone, DROP mdp, DROP mdpconfirm, DROP slug');
    }
}
