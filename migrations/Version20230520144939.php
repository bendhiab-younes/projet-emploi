<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230520144939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, heure_debut VARCHAR(255) NOT NULL, heure_fin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seance ADD horaires_id INT NOT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E8AF49C8B FOREIGN KEY (horaires_id) REFERENCES horaire (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E8AF49C8B ON seance (horaires_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8AF49C8B');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP INDEX IDX_DF7DFD0E8AF49C8B ON seance');
        $this->addSql('ALTER TABLE seance DROP horaires_id');
    }
}
