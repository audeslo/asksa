<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200109093328 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, edited_by_id INT DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, intitule VARCHAR(255) NOT NULL, datecommande DATE NOT NULL, description LONGTEXT DEFAULT NULL, created_on DATETIME NOT NULL, etat SMALLINT NOT NULL, edited_on DATETIME DEFAULT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_6EEAA67D670C757F (fournisseur_id), INDEX IDX_6EEAA67DB03A8386 (created_by_id), INDEX IDX_6EEAA67DDD7B2EBC (edited_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commander (id INT AUTO_INCREMENT NOT NULL, produit_id INT NOT NULL, commande_id INT NOT NULL, created_by_id INT DEFAULT NULL, edited_by_id INT DEFAULT NULL, capacite_id INT DEFAULT NULL, quantitecommandee INT NOT NULL, capacitebidon INT DEFAULT NULL, capacitecarton INT DEFAULT NULL, quantiteenstock INT NOT NULL, etat SMALLINT NOT NULL, sousreference VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_on DATETIME NOT NULL, edited_on DATETIME DEFAULT NULL, INDEX IDX_42D318BAF347EFB (produit_id), INDEX IDX_42D318BA82EA2E54 (commande_id), INDEX IDX_42D318BAB03A8386 (created_by_id), INDEX IDX_42D318BADD7B2EBC (edited_by_id), INDEX IDX_42D318BA7C79189D (capacite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandeshow (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, showroom_id INT NOT NULL, intituleshow VARCHAR(255) NOT NULL, datecomshow DATE NOT NULL, reference VARCHAR(255) DEFAULT NULL, fournisseurshow VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME DEFAULT NULL, credited_on DATETIME DEFAULT NULL, statut SMALLINT NOT NULL, INDEX IDX_7835D7ABDD7B2EBC (edited_by_id), INDEX IDX_7835D7ABB03A8386 (created_by_id), INDEX IDX_7835D7AB2243B88B (showroom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandershow (id INT AUTO_INCREMENT NOT NULL, edited_by_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, commandeshow_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, capacite_id INT DEFAULT NULL, capacitecartonshow INT NOT NULL, capacitebidonshow INT NOT NULL, quantitecommandeshow INT NOT NULL, quantitestock INT NOT NULL, slug VARCHAR(255) NOT NULL, edited_on DATETIME DEFAULT NULL, created_on DATETIME NOT NULL, reference VARCHAR(255) NOT NULL, INDEX IDX_60333357DD7B2EBC (edited_by_id), INDEX IDX_60333357B03A8386 (created_by_id), INDEX IDX_603333572BA6E032 (commandeshow_id), INDEX IDX_60333357F347EFB (produit_id), UNIQUE INDEX UNIQ_603333577C79189D (capacite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stockshowroom (id INT AUTO_INCREMENT NOT NULL, commandershow_id INT NOT NULL, created_by_id INT DEFAULT NULL, edited_by_id INT DEFAULT NULL, capacite_id INT DEFAULT NULL, referencecarton VARCHAR(255) NOT NULL, referencebidon VARCHAR(255) NOT NULL, ouvert TINYINT(1) NOT NULL, vendu TINYINT(1) NOT NULL, prixdevente INT NOT NULL, slug VARCHAR(255) NOT NULL, created_on DATETIME NOT NULL, edited_on DATETIME DEFAULT NULL, sync TINYINT(1) NOT NULL, INDEX IDX_73C1B5914409F943 (commandershow_id), INDEX IDX_73C1B591B03A8386 (created_by_id), INDEX IDX_73C1B591DD7B2EBC (edited_by_id), INDEX IDX_73C1B5917C79189D (capacite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DDD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commander ADD CONSTRAINT FK_42D318BAF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE commander ADD CONSTRAINT FK_42D318BA82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE commander ADD CONSTRAINT FK_42D318BAB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commander ADD CONSTRAINT FK_42D318BADD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commander ADD CONSTRAINT FK_42D318BA7C79189D FOREIGN KEY (capacite_id) REFERENCES capacite (id)');
        $this->addSql('ALTER TABLE commandeshow ADD CONSTRAINT FK_7835D7ABDD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandeshow ADD CONSTRAINT FK_7835D7ABB03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandeshow ADD CONSTRAINT FK_7835D7AB2243B88B FOREIGN KEY (showroom_id) REFERENCES showroom (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_60333357DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_60333357B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_603333572BA6E032 FOREIGN KEY (commandeshow_id) REFERENCES commandeshow (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_60333357F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE commandershow ADD CONSTRAINT FK_603333577C79189D FOREIGN KEY (capacite_id) REFERENCES capacite (id)');
        $this->addSql('ALTER TABLE stockshowroom ADD CONSTRAINT FK_73C1B5914409F943 FOREIGN KEY (commandershow_id) REFERENCES commandershow (id)');
        $this->addSql('ALTER TABLE stockshowroom ADD CONSTRAINT FK_73C1B591B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE stockshowroom ADD CONSTRAINT FK_73C1B591DD7B2EBC FOREIGN KEY (edited_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE stockshowroom ADD CONSTRAINT FK_73C1B5917C79189D FOREIGN KEY (capacite_id) REFERENCES capacite (id)');
        $this->addSql('ALTER TABLE vente_stock ADD capacite_id INT DEFAULT NULL, CHANGE contenant contenant TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE vente_stock ADD CONSTRAINT FK_5F275B297C79189D FOREIGN KEY (capacite_id) REFERENCES capacite (id)');
        $this->addSql('CREATE INDEX IDX_5F275B297C79189D ON vente_stock (capacite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commander DROP FOREIGN KEY FK_42D318BA82EA2E54');
        $this->addSql('ALTER TABLE commandershow DROP FOREIGN KEY FK_603333572BA6E032');
        $this->addSql('ALTER TABLE stockshowroom DROP FOREIGN KEY FK_73C1B5914409F943');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commander');
        $this->addSql('DROP TABLE commandeshow');
        $this->addSql('DROP TABLE commandershow');
        $this->addSql('DROP TABLE stockshowroom');
        $this->addSql('ALTER TABLE vente_stock DROP FOREIGN KEY FK_5F275B297C79189D');
        $this->addSql('DROP INDEX IDX_5F275B297C79189D ON vente_stock');
        $this->addSql('ALTER TABLE vente_stock DROP capacite_id, CHANGE contenant contenant VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
