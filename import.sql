DROP DATABASE IF EXISTS sparklabs;
CREATE DATABASE sparklabs;
USE sparklabs;

CREATE TABLE events (
    event_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    event_name VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    location VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    capacity INT NOT NULL,
    beschrijving TEXT NOT NULL, -- ✅ VERPLICHT
    tickets_sold INT NOT NULL DEFAULT 0
) ENGINE=InnoDB;

CREATE TABLE users (
    user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE meetgroups (
    meetgroup_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    meetgroup_name VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE event_meetgroups (
    event_id INT NOT NULL,
    meetgroup_id INT NOT NULL,
    PRIMARY KEY (event_id, meetgroup_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    FOREIGN KEY (meetgroup_id) REFERENCES meetgroups(meetgroup_id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE tickets (
    ticket_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    UNIQUE (event_id, user_id) -- ✅ voorkomt dubbel kopen
) ENGINE=InnoDB;

CREATE TABLE planning (
    planning_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    event_id INT NOT NULL,
    task VARCHAR(255) NOT NULL,
    assigned_to VARCHAR(255),
    due_date DATE,
    status VARCHAR(50) DEFAULT 'pending',
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE INDEX idx_tickets_event ON tickets(event_id);
CREATE INDEX idx_tickets_user ON tickets(user_id);
CREATE INDEX idx_events_date ON events(event_date);

INSERT INTO events (event_name, event_date, location, price, capacity, tickets_sold, beschrijving)
VALUES
('AI & Future Tech Expo 2026', '2026-06-10', 'Amsterdam RAI', 59.99, 500, 120,
 'Een toonaangevend evenement over kunstmatige intelligentie, innovatie en toekomstige technologieën.'),

('Cyber Security Summit Europe', '2026-07-05', 'Utrecht Jaarbeurs', 89.99, 800, 350,
 'Internationaal congres over cybersecurity en digitale veiligheid.'),

('Web Development Conference NL', '2026-05-20', 'Rotterdam Ahoy', 39.99, 600, 200,
 'Conferentie voor webdevelopers met focus op moderne frameworks en UX.'),

('Robotics & Automation Fair', '2026-08-15', 'Eindhoven High Tech Campus', 49.99, 400, 90,
 'Beurs over robotica en automatisering met live demonstraties.');

 CREATE TABLE news (
    news_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255) NOT NULL
);

INSERT INTO news (title, content, image) VALUES
('MindControl: The First Brain-Powered Controller!',
 'A revolutionary Silicon Valley start-up claims to have developed the first game controller that reacts directly to your brain activity. Forget buttons—just think and play!',
 'mindcontrol.png'),

('Exclusive: PixelStorm Building Massive Esports Arena',
 'Construction has begun on the PixelStorm Dome, a futuristic Esports arena with 5000 seats and 360-degree screens.',
 'pixelstadion.png'),

('AI Defeats Pro-Gamer Team in Complex Strategy Match',
 'The AI Orion-X defeated world champion team Cosmic Knights using creative tactics never seen before.',
 'match.png'),

('Major Server Upgrade Complete: Say Goodbye to Lag!',
 'A massive server upgrade ensures ultra-low latency and better performance at all events.',
 'lag.png');