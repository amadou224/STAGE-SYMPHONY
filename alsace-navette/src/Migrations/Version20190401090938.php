<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190401090938 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation CHANGE date_reservation date_reservation DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE date_creation date_creation DATETIME NOT NULL');
        $this->addSql('ALTER TABLE message CHANGE date_message date_message DATETIME NOT NULL');
        $this->addSql('ALTER TABLE facture CHANGE date_facture date_facture DATETIME NOT NULL');
        $this->addSql('ALTER TABLE trajet ADD vehicule_id INT DEFAULT NULL, ADD chauffeur_id INT DEFAULT NULL, CHANGE date_trajet date_trajet DATETIME NOT NULL');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98C4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE trajet ADD CONSTRAINT FK_2B5BA98C85C0B3BE FOREIGN KEY (chauffeur_id) REFERENCES chauffeur (id)');
        $this->addSql('CREATE INDEX IDX_2B5BA98C4A4A3511 ON trajet (vehicule_id)');
        $this->addSql('CREATE INDEX IDX_2B5BA98C85C0B3BE ON trajet (chauffeur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE facture CHANGE date_facture date_facture DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE message CHANGE date_message date_message DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE reservation CHANGE date_reservation date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98C4A4A3511');
        $this->addSql('ALTER TABLE trajet DROP FOREIGN KEY FK_2B5BA98C85C0B3BE');
        $this->addSql('DROP INDEX IDX_2B5BA98C4A4A3511 ON trajet');
        $this->addSql('DROP INDEX IDX_2B5BA98C85C0B3BE ON trajet');
        $this->addSql('ALTER TABLE trajet DROP vehicule_id, DROP chauffeur_id, CHANGE date_trajet date_trajet DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE date_creation date_creation DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
    }
}
