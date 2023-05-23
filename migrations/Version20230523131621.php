<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230523131621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, heure_debut VARCHAR(255) NOT NULL, heure_fin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, cin INT NOT NULL, departement VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jour CHANGE nom_jour nom_jour VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE seance ADD horaires_id INT NOT NULL');
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
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8AF49C8B');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE jour CHANGE nom_jour nom_jour DATE NOT NULL');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EF46CD258');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E220C6AD0');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0EDC304035');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E8F5EA509');
        $this->addSql('DROP INDEX IDX_DF7DFD0EF46CD258 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E220C6AD0 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0EDC304035 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E8F5EA509 ON seance');
        $this->addSql('DROP INDEX IDX_DF7DFD0E8AF49C8B ON seance');
        $this->addSql('ALTER TABLE seance DROP horaires_id');
    }
}
