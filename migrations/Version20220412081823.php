<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220412081823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL, CHANGE level level INT NOT NULL, CHANGE xp xp INT NOT NULL, CHANGE coins coins INT NOT NULL, CHANGE nb_win nb_win INT NOT NULL, CHANGE nb_loose nb_loose INT NOT NULL');
        $this->addSql('ALTER TABLE user_inventory DROP FOREIGN KEY foreign_item');
        $this->addSql('ALTER TABLE user_inventory DROP FOREIGN KEY foreign_user');
        $this->addSql('ALTER TABLE user_inventory CHANGE user_id user_id INT DEFAULT NULL, CHANGE item_id item_id INT DEFAULT NULL, CHANGE nb nb INT NOT NULL');
        $this->addSql('ALTER TABLE user_inventory ADD CONSTRAINT FK_B1CDC7D2126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE user_inventory ADD CONSTRAINT FK_B1CDC7D2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP is_verified, CHANGE level level INT DEFAULT 0 NOT NULL, CHANGE xp xp INT DEFAULT 0 NOT NULL, CHANGE coins coins INT DEFAULT 0 NOT NULL, CHANGE nb_win nb_win INT DEFAULT 0 NOT NULL, CHANGE nb_loose nb_loose INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE user_inventory DROP FOREIGN KEY FK_B1CDC7D2126F525E');
        $this->addSql('ALTER TABLE user_inventory DROP FOREIGN KEY FK_B1CDC7D2A76ED395');
        $this->addSql('ALTER TABLE user_inventory CHANGE item_id item_id INT NOT NULL, CHANGE user_id user_id INT NOT NULL, CHANGE nb nb INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE user_inventory ADD CONSTRAINT foreign_item FOREIGN KEY (item_id) REFERENCES item (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_inventory ADD CONSTRAINT foreign_user FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
