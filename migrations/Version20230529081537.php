<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230529081537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8AF49C8B');
        $this->addSql('DROP INDEX IDX_DF7DFD0E8AF49C8B ON seance');
        $this->addSql('ALTER TABLE seance CHANGE horaires_id horaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E58C54515 FOREIGN KEY (horaire_id) REFERENCES horaire (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E58C54515 ON seance (horaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E58C54515');
        $this->addSql('DROP INDEX IDX_DF7DFD0E58C54515 ON seance');
        $this->addSql('ALTER TABLE seance CHANGE horaire_id horaires_id INT NOT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E8AF49C8B FOREIGN KEY (horaires_id) REFERENCES horaire (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E8AF49C8B ON seance (horaires_id)');
    }
}
