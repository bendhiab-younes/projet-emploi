<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230526095816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E220C6AD0 FOREIGN KEY (jour_id) REFERENCES jour (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0EDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E8AF49C8B FOREIGN KEY (horaires_id) REFERENCES horaire (id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0EF46CD258 ON seance (matiere_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E220C6AD0 ON seance (jour_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0EDC304035 ON seance (salle_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E8F5EA509 ON seance (classe_id)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E8AF49C8B ON seance (horaires_id)');
        $this->addSql('ALTER TABLE user ADD type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP type');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EF46CD258');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E220C6AD0');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EDC304035');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8F5EA509');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8AF49C8B');
        $this->addSql('DROP INDEX IDX_DF7DFD0EF46CD258 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E220C6AD0 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0EDC304035 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E8F5EA509 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E8AF49C8B ON seance');
    }
}
