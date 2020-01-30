<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200129142531 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ticket_spectacle (ticket_id INT NOT NULL, spectacle_id INT NOT NULL, INDEX IDX_7F6AACBE700047D2 (ticket_id), INDEX IDX_7F6AACBEC682915D (spectacle_id), PRIMARY KEY(ticket_id, spectacle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_spectacle (team_id INT NOT NULL, spectacle_id INT NOT NULL, INDEX IDX_52556813296CD8AE (team_id), INDEX IDX_52556813C682915D (spectacle_id), PRIMARY KEY(team_id, spectacle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_spectacle (user_id INT NOT NULL, spectacle_id INT NOT NULL, INDEX IDX_E5B0FB10A76ED395 (user_id), INDEX IDX_E5B0FB10C682915D (spectacle_id), PRIMARY KEY(user_id, spectacle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ticket_spectacle ADD CONSTRAINT FK_7F6AACBE700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket_spectacle ADD CONSTRAINT FK_7F6AACBEC682915D FOREIGN KEY (spectacle_id) REFERENCES spectacle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_spectacle ADD CONSTRAINT FK_52556813296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_spectacle ADD CONSTRAINT FK_52556813C682915D FOREIGN KEY (spectacle_id) REFERENCES spectacle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_spectacle ADD CONSTRAINT FK_E5B0FB10A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_spectacle ADD CONSTRAINT FK_E5B0FB10C682915D FOREIGN KEY (spectacle_id) REFERENCES spectacle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA3A76ED395 ON ticket (user_id)');
        $this->addSql('ALTER TABLE spectacle ADD team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE spectacle ADD CONSTRAINT FK_E55076F4296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_E55076F4296CD8AE ON spectacle (team_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ticket_spectacle');
        $this->addSql('DROP TABLE team_spectacle');
        $this->addSql('DROP TABLE user_spectacle');
        $this->addSql('ALTER TABLE spectacle DROP FOREIGN KEY FK_E55076F4296CD8AE');
        $this->addSql('DROP INDEX IDX_E55076F4296CD8AE ON spectacle');
        $this->addSql('ALTER TABLE spectacle DROP team_id');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3A76ED395');
        $this->addSql('DROP INDEX IDX_97A0ADA3A76ED395 ON ticket');
        $this->addSql('ALTER TABLE ticket DROP user_id');
    }
}
