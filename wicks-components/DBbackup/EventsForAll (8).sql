-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 11:49 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EventsForAll`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attendees`
--

CREATE TABLE `Attendees` (
  `attendeeID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Attendees`
--

INSERT INTO `Attendees` (`attendeeID`, `eventID`, `userID`) VALUES
(2, 12, 1),
(3, 12, 38),
(4, 12, 2),
(5, 12, 34),
(7, 38, 34),
(8, 77, 34),
(9, 42, 34),
(10, 72, 34);

-- --------------------------------------------------------

--
-- Table structure for table `EventImgs`
--

CREATE TABLE `EventImgs` (
  `imageID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `EventImgs`
--

INSERT INTO `EventImgs` (`imageID`, `eventID`, `userID`, `imageName`) VALUES
(1, 9, 1, '5ea62a0f61fb52.63429654.jpeg'),
(2, 11, 1, '5ea6feb97ad594.75880811.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `EventID` int(11) NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL,
  `eventTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endDate` date DEFAULT NULL,
  `endTime` time NOT NULL,
  `street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `USstate` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `eventDescription` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `genre` int(2) NOT NULL,
  `privacy` tinyint(1) NOT NULL DEFAULT '0',
  `maxNumAttendees` int(10) DEFAULT NULL,
  `eventStatus` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`EventID`, `userID`, `eventTitle`, `startDate`, `startTime`, `endDate`, `endTime`, `street`, `city`, `USstate`, `zip`, `eventDescription`, `genre`, `privacy`, `maxNumAttendees`, `eventStatus`) VALUES
(1, 1, 'Test Event 1', '2020-03-22', '12:00:00', '2020-03-22', '13:00:00', '720 Northern Blvd.', 'Brookville', 'NY', '11548', 'This is a test event.', 9, 0, NULL, 0),
(2, 1, 'Test Event 2', '2020-03-31', '12:00:00', '2020-03-31', '13:00:00', '746 Sheraton Drive', 'Virginia Beach', 'Va', '23452', 'This is a test event', 0, 0, NULL, 0),
(3, 37, 'Test Event 10', '2020-04-18', '12:00:00', '2020-04-18', '13:00:00', '20 Tester Drive', 'Wheatley heights', 'NY', '11798', 'This is another test event.', 2, 0, 20, 0),
(4, 1, 'Test Event 12', '2020-04-25', '12:00:00', '2020-04-25', '13:00:00', '250 Cricket Court', 'Wading River', 'NY', '12345', 'description of event.', 0, 0, 0, 0),
(5, 1, 'Test Event 11', '2020-04-30', '12:00:00', '2020-04-30', '13:00:00', '720 Northern Blvd.', 'Brookville', 'NY', '11548', 'Testing event image.', 2, 0, 20, 0),
(6, 1, 'Test Event 14', '2020-04-30', '12:00:00', '2020-04-30', '13:00:00', '746 Sheraton Drive', 'Virginia Beach', 'VA', '23452', 'Testing event creation.', 0, 0, 0, 0),
(7, 1, 'Test Event 21', '2020-04-30', '12:00:00', '2020-04-30', '13:00:00', '746 Sheraton Drive', 'Virginia Beach', 'Va', '23452', 'testing image upload', 2, 0, 0, 0),
(8, 1, 'Test Event 21', '2020-04-30', '12:00:00', '2020-05-01', '13:00:00', '746 Sheraton Drive', 'Virginia Beach', 'Va', '23452', 'testing image upload', 5, 0, 0, 0),
(9, 1, 'Test Event 10', '2020-05-29', '12:00:00', '2020-05-30', '13:00:00', '123 Shell Street', 'Centereach', 'NY', '11548', 'testing image upload.', 2, 0, 0, 0),
(10, 1, 'Test Private Event', '2020-04-30', '12:00:00', '2020-04-29', '13:00:00', '250 Cricket Court', 'Wading River', 'NY', '12345', 'Testing event privacy.', 0, 1, 0, 0),
(11, 1, 'Sprint 4 Event', '2020-04-30', '15:00:00', '2020-04-30', '17:00:00', '720 Northern Blvd.', 'Brookville', 'NY', '11548', 'This is a test event for sprint 4 demo.', 1, 0, 0, 0),
(12, 1, 'Open Hockey At Dix Hills Park', '2020-05-23', '23:50:00', '2020-05-24', '00:50:00', 'Baron Street', 'Peconic', 'NY', '11935', 'One hour skate. All goalies who sign up via this form MUST BE PRESENT 10 minutes prior to starting time at the game they intend on playing in. Any goalie who fails to show up or repeatedly cancels after signing up will be put on notice and may be permanently barred from playing goalie in any and all future open hockey games.', 7, 0, NULL, 0),
(21, 51, 'Treasure Cove Resort Marina Kayaking', '2020-05-24', '19:00:00', NULL, '20:00:00', '809 East Main Street', 'Riverhead', 'NY', '11901', 'Boaters discover the beauty of Long Island’s local waterways during their marine experience.', 6, 0, NULL, 0),
(22, 60, '5k Run in Calverton', '2020-08-20', '18:00:00', NULL, '19:00:00', '5789 Middle Country Road', 'Calverton', 'NY', '11901', 'Celebrate the warm weather with an exhilarating 5k run throughout Calverton NY. All experience levels are welcome.', 6, 0, 20, 0),
(23, 57, 'Kickboxing Classes', '2020-08-12', '15:00:00', NULL, '17:00:00', '1166 Montauk Highway', 'Mastic', 'NY', '11950', 'Fitness instructor Jessica will work with you to achieve your goals and reach maximum heights.', 6, 1, 25, 0),
(24, 40, 'Golf at Dubstread Golf Course', '2020-08-01', '10:00:00', NULL, '16:00:00', '3201 Woodgate Blvd', 'Orlando', 'FL', '32822', 'Par 3 course enjoy the greens with friends on a nice sunny day and practice your golf skills!', 6, 0, 20, 0),
(25, 53, 'Open Hockey Peconic Inline Hockey Rink', '2020-06-01', '20:00:00', NULL, '22:00:00', 'Cochrane Park', 'Peconic', 'NY', '11935', 'Enjoy 5 on 5 pickup hockey with friends and meet new people!', 6, 0, NULL, 0),
(26, 56, 'Yankees Vs Reds at Yankee Stadium', '2020-06-02', '19:00:00', NULL, '22:00:00', 'One East 161st Street', 'Bronx', 'NY', '10453', 'Root the yankees on against the cincinnati reds in a home game.', 6, 0, NULL, 0),
(27, 59, 'Open Tennis at Mattituck Tennis Courts', '2020-07-01', '10:00:00', NULL, '12:00:00', '420 Oaklawn Avenue', 'Southold', 'NY', '11971', 'Bring your racket and enjoy the fun', 6, 0, NULL, 0),
(28, 55, 'Long Island Ducks Baseball Game', '2020-07-16', '19:00:00', NULL, '21:30:00', '3 Court House Dr', 'Central Islip', 'NY', '11722', 'Come support your local baseball team in an exciting environment rooting on your favorite players.', 6, 0, 6002, 0),
(29, 41, 'Las Vegas Aces Vs at Connecticut Suns', '2020-09-16', '19:00:00', NULL, '21:00:00', '1 Mohegan Sun Boulevard', 'Uncasville', 'CT', '06382', 'Come support the Connecticut Suns as they take on the Las Vegas Aces.', 6, 0, 9323, 0),
(30, 54, 'Tech Up For Womens Conference.', '2020-07-12', '09:00:00', NULL, '19:00:00', '655 W 34th St', 'New York City', 'NY', '10001', 'Tech Up For Women Conference, a one-day event for the advancement of women in business through technology education, resources & networking', 7, 0, NULL, 0),
(31, 42, 'Blockchain Express Webinar', '2020-02-19', '12:00:00', NULL, '14:00:00', '11 Centre St', 'New York City', 'NY', '10007', 'The workshop presents you with an opportunity to unravel the mysteries of blockchain technology. We aim to empower you with the knowledge and understanding of this growing and revolutionary technology, and support you to kick start your career/business in this space.', 7, 0, NULL, 0),
(32, 58, 'CASPA Job Fair 2020', '2020-05-09', '11:00:00', NULL, '16:00:00', '777 Bellew Drive', 'San Francisco', 'CA', '95035', 'The High-Tech Job Fair is one of the most important CASPA annual events. Since 1995, it has become a well received signature event attracting many international and US companies and hundreds of job seekers every year. This year, we expect to have more than 15 hiring companies and over 1,000 job seekers to join the High-Tech Job Fair.', 7, 0, 1000, 0),
(33, 50, 'New York RegTech Data Summit', '2020-05-22', '12:00:00', NULL, '16:30:00', '1 Liberty Street', 'New York City', 'NY', '10006', 'From Monday, April 20, to Friday, April 22, the Data Coalition will host RegTech Data Week – a virtual event series – presented by DFIN. This virtual event series is a re-launch of our RegTech Data Summit.', 7, 0, NULL, 0),
(34, 61, '4 Weekends Data Science Training in Pasadena', '2020-05-29', '08:30:00', NULL, '10:30:00', 'TruVs', 'Pasadena', 'CA', '19001', '4 Weekends, 8 sessions, 16 Hours of total Instructor-led and guided training. Training material, instructor handouts and access to useful resources on the cloud provided. Practical Hands-on Lab exercises provided. Actual code and scripts provided. Real-life Scenarios.', 7, 0, NULL, 0),
(35, 52, 'ModelExpand Presents: Diversity Recruiting Bootcamp', '2020-08-07', '10:00:00', NULL, '15:00:00', '225 Bush Street', 'San Francisco', 'CA', '94103', 'ModelExpands Diversity Recruiting Training will conduct a deep-dive into key parts of the hiring process to empower attendees with the foundational knowledge needed to institute change in hiring outcomes.', 7, 0, NULL, 0),
(36, 34, 'Software Engineering Showcase and Networking Night', '2020-05-27', '16:30:00', NULL, '18:00:00', '1460 Mission Street', 'San Francisco', 'CA', '94103', 'We are excited to welcome you onto the Flatiron School San Francisco state of the art campus for an evening of networking, tech demos, and celebration for our graduating Software Engineering students! We will have food and drinks, and students will present their final projects alongside each other.', 7, 0, NULL, 0),
(37, 38, 'Create Your Own Video Game with JavaScript: Workshop', '2020-05-05', '18:00:00', NULL, '19:30:00', '1460 Mission Street', 'San Francisco', 'CA', '94103', 'Join us for an evening of learning through code, lead by our Software Engineering instructor, Matt! During this workshop, we will introduce you to the Canvas API, and how you can use it to draw graphics on an HTML page. By the end, you will learn how to build a simple video game using JavaScript, one of the three key building blocks of the modern web!', 7, 0, NULL, 0),
(38, 35, 'Technarte Los Angeles 2020: International Conference on Art and Technology', '2020-08-06', '09:00:00', '2020-09-07', '14:00:00', '251 South Main Street', 'Los Angeles', 'CA', '90012', 'Ever since its first edition in 2006, Technarte Conference is where artists, designers and researchers from all around the world meet to share their vision of the fusion between art and technology in a close and friendly atmosphere. Technarte also includes social events that are an excellent opportunity for you to talk to the speakers and attendees. A perfect time for networking with the art and technology community', 7, 0, NULL, 0),
(39, 37, 'Annual US-ISRAEL Technology Fair', '2020-07-09', '12:00:00', NULL, '17:50:00', '1001 Page Mill Road', 'Palo Alto', 'CA', '94304', 'Join us at the US–ISRAEL Technology Event, where delegates from selected startup companies on the cutting-edge of Israeli technological innovation, will present short pitches and demonstrations. The event will provide a great opportunity to identify breakthrough solutions and attendees will also be given the opportunity to have one-on-one meetings, following the initial presentations.With over 500 Israeli Startups presenting at our worldwide events, our conferences provide a major opportunity via our interactive platforms to meet up with Israel’s most innovative and exciting startups.', 7, 0, NULL, 0),
(40, 48, 'The Arlington All-Star Craft Beer, Wine, and Cocktail Festival', '2020-05-09', '19:30:00', NULL, '23:30:00', '734 Stadium Dr', 'Arlington', 'TX', '76011', 'On Saturday, May 9, 2020, Globe Life Field, home of the Texas Rangers, will be the host for Arlington’s most popular craft beer, wine, and cocktail festival ever featuring hundreds of different brands!  Do not miss this one-of-a-kind ballpark craft beer fest experience.', 1, 0, NULL, 0),
(41, 49, 'North Fork Crush Wine & Artisanal Food Festival', '2020-06-20', '12:00:00', NULL, '19:00:00', '6025 Sound Avenue', 'Riverhead', 'NY', '11901', 'Explore world-class wines, nosh on local gourmet food, and meet the makers at North Fork Crush Wine & Artisanal Food Festival. Long Island’s North Fork is New York’s unheralded ‘Wine Country’, and North Fork Crush’s affordable luxury brings you the best of the region, at stunning RGNY Wine.', 1, 0, NULL, 0),
(42, 51, '2nd Annual Seafood and Brew Fest at Thimble Island Brewery', '2020-08-08', '11:00:00', NULL, '20:00:00', '16 Business Park Drive', 'Branford', 'CT', '06405', 'Celebrate Summer with the Thimble Brew Crew, The Chowder Pot, The Zoo Band & The Muddy Rudders!Our 2nd Annual Seafood and Brew Fest will be here at Thimble Island Brewery on Saturday, August 8th! Join us for great beer, delicious seafood stations, hot dogs, hamburgers and music all day long from 12-8PM. Branford’s own Captain of the Sea Mist Mike Infantino will be here playing jams as well as The Zoo, the headliner! Come jam, eat some grub and drink awesome beer!', 1, 0, NULL, 0),
(43, 60, '5th Annual Blue Island Oyster Festival', '2020-09-19', '12:00:00', NULL, '16:00:00', '136 Atlantic Avenue', 'West Sayville', 'NY', '11796', 'Blue Island Oyster Foundation will host the 5th annual Blue Island Oyster Festival, to benefit Blue Island Oyster Foundation & Save the Great South Bay, two organizations dedicated to raising awareness of how to protect our beloved Great South Bay.', 1, 0, 500, 0),
(44, 57, 'The Brewers Ball - Home Brew Festival 2020 from Smoke in the Valley and Bad Sons Beer Co!', '2020-06-13', '12:00:00', NULL, '16:00:00', '251 Roosevelt Drive', 'Derby', 'CT', '06418', 'Festival is Saturday June 13th at Bad Sons Brewery in Derby and will also feature Food Trucks, Artisan Vendors and Games! Tickets can be purchased online at www.smokeinthevalley.com and at the Brewery!', 1, 0, NULL, 0),
(45, 40, 'Join Hoboken Happy Hours & Party With Purpose for the 2nd Annual Hoboken Mac & Cheese Festival!', '2020-09-26', '12:30:00', NULL, '17:30:00', '422 Willow Avenue', 'Hoboken', 'NJ', '07030', 'Join us and Party With Purpose on Saturday, September 26th at Our Lady of Grace Church for a food festival you do not want to miss! Round up your crew, bring your family, and get ready to sample all kinds of Mac & Cheese creations (more on that below) from some of the best spots in Hoboken - or dare we say, New Jersey?', 1, 0, NULL, 0),
(46, 53, 'Dessert Goals - Dessert Fest - NYC', '2020-07-18', '12:00:00', '2020-07-19', '19:00:00', '4-40 44th Drive', 'Queens', 'NY', '11101', 'Because dessert is always a good idea, Dessert Goals is back in NYC for the 10th edition of the festival presented, by Chase Sapphire®! This is a special celebration (10 festivals since we launched in 2016!!), so we are rounding up our dessertgoalsalumni for the ultimate dessert party featuring a menu of all returning vendors. The theme is Pattern Party, so get your polka dots, stripes and bold prints ready and meet us at Sound River Studios in Long Island City on July 18+19!', 1, 0, NULL, 0),
(47, 56, 'The Joy of Sake New York 2020', '2020-06-26', '18:30:00', NULL, '21:30:00', '125 West 18th Street', 'New York City', 'NY', '10011', 'The Joy of Sake returns to New York for its 16th annual celebration with a superb array of premium labels and the best in traditional and contemporary Asian cuisine. The sakes are in peak condition, the food sublime, the crowd amazing. It’s a one-of-a-kind event featuring over 400 premium labels from every part of Japan and sake appetizers from 18 of New York’s finest restaurants.', 1, 0, NULL, 0),
(48, 59, 'Riverhead Farmers Market', '2020-04-18', '10:00:00', NULL, '14:00:00', '54 East Main Street', 'Riverhead', 'NY', '11901', 'Indoor winter market operated by the East End Food Institute in Riverhead, featuring locally grown and sourced produce, dairy, poultry and meat, wines, baked goods and artisan-crafted products. Saturdays, Nov. 30 through April 25, 10 a.m. to 2 p.m. at 54 East Main Street, Riverhead.', 1, 0, NULL, 0),
(49, 55, 'MichelAngelo’s Mattituck', '2020-04-18', '11:00:00', NULL, '22:00:00', '10095 Main Rd ', 'Mattituck', 'NY', '11952', 'Everyday we are able to pickup food to go from MichelAngelos in Mattituck in order to suffice the shortage of food. It’s a great luxury considering desperate times. Especially, if you enjoy, Italian Food.', 1, 0, NULL, 0),
(50, 41, 'The Mavericks', '2020-05-02', '20:00:00', NULL, '21:00:00', 'Bardavon 1869 Opera House ', 'Poughkeepsie', 'NY', '12601', 'Masters of country-latino-rock n roll, born in the rich cultural mix of miami then tempered in Nashville’s country hothouse – rode high in the country and rock charts of the 1990s with culture-crossing hits like what a crying shame and all you ever do is bring me down. then they conquered europe with the titanic feelgood party classic dance the night away, a 400,000-seller in the uk. yet nothing lasts forever, and in 2004 the mavericks went on hiatus while frontman raul malo explored new musical avenues.', 3, 0, NULL, 0),
(51, 54, '5 Seconds of Summer', '2020-08-29', '19:00:00', NULL, '22:00:00', '1 Mohegan Sun Blvd', 'Uncasville', 'CT', '06382', 'Come join the Mavericks at Mohegan Sun Arena and enjoy a variety of music from a very diverse band. 5 Seconds of summer is an Australian Pop Band from Sydney', 3, 0, NULL, 0),
(52, 42, 'City and Colour', '2020-09-23', '20:00:00', NULL, '22:00:00', '238 College St', 'New Haven', 'CT', '06510', 'Come join City and Colour at College Street Music Hall! The event unfortunately had to be rescheduled, but September is the anticipated date.', 3, 0, NULL, 0),
(53, 58, 'Wu-Tang Clan', '2020-05-30', '19:30:00', NULL, '22:30:00', '116 Fifth Avenue North', 'Nashville', 'TN', '37219', 'Wu-Tang clan has been a staple for Rap Music for the past decades. The opportunity to see them in Nashville is a performance in a lifetime.', 3, 0, NULL, 0),
(54, 50, 'Wale', '2020-05-08', '20:00:00', NULL, '22:00:00', '39 Norwich Westerly Rd', 'Ledyard', 'CT', '06339', 'Come see Wale perform hit singles such as his hit single Lotus Flower Bomb and other amazing live song performances..', 3, 0, NULL, 0),
(55, 61, 'Post Malone Live', '2020-06-17', '21:00:00', NULL, '23:00:00', '1255 Hempstead Turnpike', 'East Meadow', 'NY', '11553', 'Post malone has taken over the United States by storm. The opportunity to see him is something that is an experience in a lifetime..', 3, 0, NULL, 0),
(56, 34, 'Circa Survive', '2020-06-05', '19:30:00', NULL, '22:00:00', '31 Webster St', 'Hartford', 'CT', '06114', 'Circa Survive Live at the Webster Theatre!', 3, 0, NULL, 0),
(57, 35, 'Harry Styles', '2020-08-26', '20:00:00', NULL, '22:00:00', '1 Panther Pkwy', 'Sunrise', 'FL', '33323', 'Come listen to the Eagles in the United Kingdom as their tour continues to go on post epidemic.', 3, 0, NULL, 0),
(58, 37, 'Splish Splash Water Park', '2020-05-23', '10:00:00', '2020-09-07', '17:00:00', '2549 Splish Splash Drive', 'Calverton', 'NY', '25499', 'Splish Splash continues to deliver the best Water Park on Long Island. From Family fun, to good eats, to just a casual trip on the lazy river. Bring friends, family, and loved ones and you will be sure to have a great time.', 4, 0, NULL, 0),
(59, 52, 'Six Flags Great Adventure', '2020-07-15', '10:30:00', '2021-07-15', '21:00:00', '1 Six Flags Blvd', 'Jackson', 'NJ', '08527', 'Enjoy some of the greatest roller coasters that the United States has to offer.', 4, 0, NULL, 0),
(60, 48, 'Long Island Aquarium', '2020-09-22', '10:30:00', '2020-12-31', '17:00:00', '431 East Main Street', 'Riverhead', 'NY', '11901', 'Long Island Aquarium takes visitors on a magical journey through a wide range of exhibits that bring undersea wonders to life. From indoor exhibits that capture the legendary ambience of the Lost City of Atlantis to outdoor exhibits located along the beautiful Peconic River to experiences with an exciting interactive dimension, Long Island Aquarium offers many ways to fascinate and captivate. So come and explore the aquarium!', 4, 0, NULL, 0),
(61, 49, 'Montauk Light House', '2020-06-04', '10:30:00', '2020-07-04', '16:00:00', '2000 Montauk Lighthouse', 'Montauk', 'NY', '11954', 'Montauk Light House provides some of the most beautiful views on Long Island. Camp Hero is quite the view!', 4, 0, NULL, 0),
(62, 51, 'Sunken Meadow State Park', '2020-05-29', '06:00:00', '2020-09-15', '09:00:00', 'Rt 25A and Sunken Meadow Parkway', 'Kings Park', 'NY', '11754', 'Among the most popular picnic parks on Long Island, Sunken Meadow hosts millions of people each year partaking of family and group outings. Pick-up sports are enjoyed on the ball fields and several informal open lawn areas. Swimming here is truly family-oriented in the generally calm waters of the Sound. Many people enjoy the health benefits of measured walks along the 3/4 mile boardwalk. Cross country running events are held over the hilly running course. The park is the northern terminus of the Long Island Greenbelt trail for hiking.', 4, 0, NULL, 0),
(63, 60, 'Cupsogue Westhampton Beach', '2020-08-04', '10:30:00', '2020-10-01', '24:00:00', '975 Dune Rd', 'Westhampton Beach', 'NY', '11978', 'Take a beautiful drive down Dune Road and appreciate the amazing houses and beaches throughout the process.', 4, 0, NULL, 0),
(64, 57, 'A Walk through Central Park', '2020-08-01', '08:00:00', '2020-10-01', '24:00:00', 'Central Park', 'Manhattan', 'NY', '10019', 'Enjoy a beautiful walk across Central Park and Enjoy the fresh sunshine!', 4, 0, NULL, 0),
(65, 2, 'Cutchogue Running Group', '2020-07-14', '08:00:00', '2020-07-14', '10:00:00', 'Monsell Lane', 'Cutchogue', 'NY', '11935', 'Enjoy a beautiful run and get some exercise to keep you busy during these trying times!', 4, 0, NULL, 0),
(66, 4, 'North Fork Scavenger Hunt', '2020-05-14', '10:00:00', '2020-05-14', '15:00:00', 'Oaklawn Avenue', 'Southold', 'NY', '11971', 'Keep your mind busy and stay 6 feet apart throughout it. Fresh air and fun can help combat the current situation.', 4, 0, NULL, 0),
(67, 3, 'Wedding Photography Workshop: Intensive!', '2020-07-18', '19:00:00', NULL, '21:00:00', '51 W 14th St #3R', 'Manhattan', 'NY', '10011', 'This course will take you through the entire process of shooting wedding photography. Students will be guided through such topics including wedding and location preparation, working with equipment, shooting techniques and styles, lighting and posing and the business end of the event. Explore the major approaches and styles popular for the event and how to work within and direct the many stages of the day’s ceremony. Additionally, the business of wedding photography, marketing and post-production will also be studied. Although this course is strictly focused on weddings, the content covered is also related to event photography.', 6, 0, NULL, 0),
(68, 50, 'Chinatown Street Photography Workshop', '2020-05-25', '12:30:00', NULL, '16:30:00', '58 Bowery', 'Manhattan', 'NY', '10013', 'This is a 4 hour street photography workshop in Chinatown and is limited to 5 people. We spend the entire time on the street shooting, discussing and reviewing. No matter what your level of experience is, amateur to professional, there’s something for everyone. All digital cameras are good for the workshop. And film works too!', 6, 1, 5, 0),
(69, 37, 'Midtown Manhattan West Street Photography Workshop', '2020-07-19', '12:30:00', NULL, '16:30:00', '6th Avenue & 41st Street', 'Manhattan', 'NY', '10036', 'This is a new workshop. It is a 4 hour street photography workshop in Midtown West and is limited to 5 people. We spend the entire time on the street shooting, discussing and reviewing. No matter what your level of experience is, amateur to professional, there’s something for everyone. All digital cameras are good for the workshop. And film works too! We’ll stop for coffee and to discuss at some point as well.', 6, 1, 5, 0),
(70, 48, 'Smartphone Photography Class', '2020-06-20', '11:00:00', NULL, '13:00:00', '49 Lawton Street', 'New Rochelle', 'NY', '10801', 'Planning a summer vacation? Take photos that you’re proud to show off. Join us for an introduction into what it takes to capture a great picture using technology already available within the palm of your hand.', 6, 0, NULL, 0),
(71, 37, 'Photography Workshop & Photowalk', '2020-06-02', '13:00:00', NULL, '12:30:00', '767 5th Avenue', 'Manhattan', 'NY', '10153', 'Learn the secret formulas to capturing beautiful moments and memories for any occasion season on your phone or DSLR. Part of life is all about capturing beautiful fun moments & creating memories. Whether it is portraits, a scenic walk, a street market, a birthday or your pet, we can help you get those timeless moments translated into a picture in the best possible way. Join us for a workshop on the secret formulas that will help you take better food photos, group photos, and interior and exterior portraits. Vinny will teach you how to compose for portraits, travel, movement, and landscape photography. You will also practicing composition, shutter speed, iso, and aperture adjustment with built-in native apps and manual mode function to get the best photo out of your camera or phone.', 6, 0, NULL, 0),
(72, 49, 'Photorama', '2020-08-29', '08:00:00', NULL, '16:00:00', '2600 Woodbridge Avenue', 'Edison', 'NJ', '08818', 'Canon Explorer of Light photographer Charles Glatzer will take you on a journey around the globe exploring wildlife photography and exotic locations. During his four 1-hour lectures, Chas will share with you his adventures, along with tips and techniques, and provide insight into his world as a wildlife photographer. The diversity of his resume includes, in portraits, weddings, advertising, catalog and product, editorial reportage, professional sports, and underwater photography. This is one event not to be missed! Make sure to mark your calendar and join us!', 6, 0, NULL, 0),
(73, 1, 'Greenwich Village Street Photography Workshop', '2020-06-15', '12:00:00', NULL, '16:00:00', 'Christopher Street Subway Station', 'Manhattan', 'NY', '10014', 'This is a 4 hour street photography workshop in Greenwich Village and is limited to 5 people. We spend the entire time on the street shooting, discussing and reviewing. No matter your level of experience amateur to professional. All digital cameras are good for the workshop. And film works too!', 6, 1, 5, 0),
(74, 4, 'Kreative Kollective Networking Event', '2020-06-24', '20:00:00', '2020-07-25', '02:00:00', '105-06 Jamaica Avenue', 'Queens', 'NY', '11418', 'Been looking for more producers, engineers, DJs, Fine artists, videographers, or photographers to work with? Looking for other YouTubers or fashion designers to collaborate with? Need more connections to makeup artists, hair stylists, nail techs, showcases and parties? This is the perfect event for all of those things!', 6, 0, NULL, 0),
(75, 2, 'Head Shots with One Wild Precious Photography', '2020-06-17', '08:30:00', NULL, '11:30:00', '115 Summit Avenue', 'Summit', 'NJ', '07901', 'During your 20-minute shoot, Magdalene will take both formal and informal headshots. You will receive the best 2 photos from Magdalene for use on your social media, website, and/or email signature. Co-Co members welcome with advance registration. As a special promotion, Magdalene is also offering participants a $40 discount on family photo shoots booked on or before June 1, 2020.', 6, 0, NULL, 0),
(76, 3, 'Street Photography Workshop: Mission District', '2020-11-14', '09:00:00', NULL, '12:00:00', '2800 Mission Street', 'San Francisco', 'CA', '94110', 'Mission’s vibrant murals serve as both art and political statements in reflecting changes— the most recent a gradual gentrification by mostly young professionals that threatens to push out many long-time residents. David will teach you street photography techniques and visual storytelling skills for using these murals as backdrops for powerful visual narratives. Along the way, you will learn local history and explore hidden places that only the most seasoned residents know about.', 6, 1, 20, 0),
(77, 2, 'YMCA Healthy Kids Day in Torrance', '2020-06-18', '10:00:00', NULL, '13:00:00', '2900 Sepulveda Boulevard', 'Torrance', 'CA', '90505', 'ET READY FOR SUMMER! (POSTPONED) Save the date for the Torrance-South Bay YMCA’s 29th Annual Healthy Kids Day on Saturday, April 18, 10:00am-1:00pm! FREE games, activities, healthy foods, Glow Zone, a photo booth, sports clinics, giveaways and more! FREE to all! Bring your family and friends!', 8, 0, NULL, 0),
(78, 51, 'Green Hill Kitchen & Que to Donate Meals to Local Hospitals', '2020-05-28', '08:00:00', NULL, '14:00:00', '101 Nicolls Rd', 'Stony Brook', 'NY', '11794', 'Green Hill Kitchen & Que is doing their part to give back to the community during these uncertain times. Green Hill Kitchen & Que is working with local farms and fisherman, as well as New York Prime Beef & Peter’s Fruit Company, to donate meals to healthcare workers in surrounding hospitals. Donations should be dropped at Green Hill Kitchen & Que and food vendors may call the restaurant directly at 631-477-4900 to schedule a drop off. The restaurant will be making donations to the following hospitals and facilities', 8, 0, NULL, 0),
(79, 50, 'Queens Pride Parade and Festival', '2020-06-07', '13:30:00', NULL, '17:30:00', '37th Ave', 'Queens', 'NY', '11372', 'QUEENS PRIDE promotes awareness and education among and of the gay, lesbian, bisexual, transgender community of Queens, New York. Our founders were provoked to organize the QUEENS PRIDE parade and festival by the murder of Julio Rivera and discrimination in our local schools.These events brought the LGBTQ community of Queens together to achieve respect, and in doing so, identified a need to take advocacy to the streets.', 8, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Friendships`
--

CREATE TABLE `Friendships` (
  `friendshipID` int(11) NOT NULL,
  `friend1userID` int(11) NOT NULL,
  `friend2userID` int(11) NOT NULL,
  `relationshipAccepted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Friendships`
--

INSERT INTO `Friendships` (`friendshipID`, `friend1userID`, `friend2userID`, `relationshipAccepted`) VALUES
(1, 1, 2, 1),
(3, 1, 33, 1),
(4, 1, 34, 1),
(5, 34, 38, 1),
(6, 1, 38, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Invitees`
--

CREATE TABLE `Invitees` (
  `inviteeID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `sendDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inviteeChoice` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Invitees`
--

INSERT INTO `Invitees` (`inviteeID`, `eventID`, `userID`, `sendDateTime`, `inviteeChoice`) VALUES
(1, 12, 1, '2020-05-09 22:13:46', 0),
(2, 12, 1, '2020-05-09 22:13:46', 0),
(3, 12, 1, '2020-05-09 22:13:46', 0),
(4, 12, 1, '2020-05-09 22:13:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `messageID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipientUserID` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `messageBody` text COLLATE utf8_unicode_ci NOT NULL,
  `sentDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `beenRead` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`messageID`, `userID`, `recipientUserID`, `subject`, `messageBody`, `sentDateTime`, `beenRead`) VALUES
(4, 1, 2, '', 'This is a test message.', '2020-05-09 22:11:16', 0),
(5, 2, 1, 'Test Message', 'Testing the messages functionality.', '2020-05-09 23:11:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `UserImgs`
--

CREATE TABLE `UserImgs` (
  `imageID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `imageName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UserImgs`
--

INSERT INTO `UserImgs` (`imageID`, `userID`, `imageName`) VALUES
(1, 1, '5e93d6bc509916.23514365.jpeg'),
(7, 33, '5e93fbcb1a8770.42322574.jpg'),
(8, 34, '5e9488a93d62d6.86983931.jpeg'),
(9, 34, '5e9488e1408d06.75726522.jpeg'),
(10, 1, '5e94891a294204.29163449.jpeg'),
(11, 35, '5e9a471f38c599.34064428.jpeg'),
(12, 37, '5e9a4d201b41a3.58310644.jpeg'),
(14, 37, '5e9a52c04843f4.81498421.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `UserProfile`
--

CREATE TABLE `UserProfile` (
  `profileID` int(11) NOT NULL,
  `userID` int(10) NOT NULL,
  `profileImg` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `hobbies` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UserProfile`
--

INSERT INTO `UserProfile` (`profileID`, `userID`, `profileImg`, `bio`, `hobbies`) VALUES
(1, 1, '5e94891a294204.29163449.jpeg', 'About Jsmith - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit porro quod sed corrupti beatae optio aperiam iure ad alias, officiis ut placeat culpa natus expedita quos aliquam accusantium. Sed, nostrum magnam? Adipisci, iusto non consequuntur enim fugit tempora nisi maxime? Added test text again.', 'Tennis,Soccer,Baseball,Lacrosse,Cycling, Surfing'),
(2, 2, 'jsmithImg1.jpeg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit porro quod sed corrupti beatae optio aperiam iure ad alias, officiis ut placeat culpa natus expedita quos aliquam accusantium. Sed, nostrum magnam? Adipisci, iusto non consequuntur enim fugit tempora nisi maxime?', 'Golf, Hockey, Fishing, Hunting, Trap Shooting'),
(7, 33, '', NULL, NULL),
(8, 34, '5e9488e1408d06.75726522.jpeg', 'This is a test bio', 'Fishing, Hunting, Sailing'),
(9, 35, '5e9a471f38c599.34064428.jpeg', NULL, NULL),
(10, 37, '5e9a52c04843f4.81498421.jpeg', 'This is a test user profile.', 'Testing, Testing, Testing, Testing,'),
(11, 38, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `USstate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `phone` char(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `email`, `userName`, `userPassword`, `firstName`, `lastName`, `street`, `city`, `USstate`, `zip`, `phone`, `dateOfBirth`) VALUES
(1, 'JohnSmith@testMail.com', 'JsmithTestUser', 'testuser1', 'John', 'Smith', '720 Broadhollow Road', 'Farmingdale', 'NY', 11735, '1234567891', '2020-12-01'),
(2, 'testUser2@test.com', 'testUser2', 'testuser2', 'Gertrude', 'Prudence', '720 Northern Blvd.', 'Brookville', 'NY', 11548, NULL, '1980-01-02'),
(3, 'testuser3@test.com', 'testUser3', 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1980-01-02'),
(4, 'testingUser4@test.com', 'testUser4', 'tetuser4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1980-01-02'),
(33, 'wicktj@farmingdale.edu', 'Tjtester', 'testuing', 'Tjtester', 'Tester', '123 Shell Street', 'Centereach', 'NY', 11548, '6311234090', '2020-04-01'),
(34, 'steww@farmingdale.edu', 'wstew', 'testing', 'will', 'stewart', '720 Northern blvd', 'Brookville', 'NY', 11753, '1233333243', '1987-08-12'),
(35, 'testerCS@test.com', 'CStest', 'testing', 'CStest', 'Inglesby', '250 Cricket Court', 'Wading River', 'NY', 12345, '1112223333', '2020-04-01'),
(37, 'thoma@farmingdale.edu', 'ThomaTest', 'testing', 'Allen', 'Thomas', '555 Campus Lane', 'Farmingdale', 'NY', 11111, '1112223333', '2020-04-02'),
(38, 'suskc@farmingdale.edu', 'chrissusky', 'Hockey77', 'Christopher', 'Suskevich', '425 Monsell Lane', 'Cutchogue', 'NY', 11935, '6316803390', '1992-12-13'),
(39, 'witcheeeee3@netscape.net', 'witch33', '12345!', 'Karen', 'Suskevich', 'P.O Box 781', 'Southold', 'NY', 11971, '6316035709', '1991-05-11'),
(40, 'gdoroski@aol.com', 'gdoroski', 'paint11', 'Gary', 'Doroski', '25 Kenneys Road', 'Southol', 'NY', 11971, '6315043322', '1960-04-05'),
(41, 'laubaud@aol.com', 'laubaud', '7fun7', 'Laurie', 'Baudoine', '433 Main Road', 'Mamaroneck', 'NY', 10538, '6215769900', '1970-07-22'),
(42, 'mikesus@gmail.com', 'mikelawrence', 'sports33', 'Mike', 'Smith', '44 Dillon Avenue', 'East Meadow', 'NY', 11554, '6311231212', '1990-09-14'),
(47, 'wavinflag36@aim.com', 'soccerfan44', 'December4!', 'David', 'Jones', '181 Sweet Hollow Road', 'Old Bethpage', 'NY', 11804, '2345678899', '1981-02-14'),
(48, 'Thomas33@gmail.com', 'ThomasG11', '00110', 'Thomas', 'Greer', '505 Old Arlington Court', 'Bridgeport', 'CT', 6606, '1234567890', '1977-08-22'),
(49, 'AndrewThomas@farmingdale.edu', 'AndrewT33', 'Fdale!', 'Andrew', 'Thomas', '844 Penn Ave', 'Forest Hills', 'NY', 11375, '2345678901', '1988-03-04'),
(50, 'Nick44@gmail.com', 'NickTheGoat', '33Goat', 'Nick', 'Hallock', '86 Addison Court', 'Suwanee', 'GA', 30024, '4560098912', '1990-04-08'),
(51, 'BrianSmith@gmail.com', 'BrianS11', '123Brian123', 'Brian', 'Smith', '294 Goldfield Street', 'Jamaica', 'NY', 11432, '7189178833', '1999-10-05'),
(52, 'NickWalker@gmail.com', 'sportsfreak12', 'Soccer!', 'Nick', 'Walker', '7787 Sunset Street', 'Troy', 'NY', 12180, '8898875660', '2000-05-06'),
(53, 'HarryHubbard@gmail.com', 'hubbard12', '12hub12', 'Harry', 'Hubbard', '33 Main Road', 'Jamesport', 'NY', 11901, '9871237456', '1980-03-03'),
(54, 'MattHallock@gmail.com', 'mattyH13', 'hallock123', 'Matt', 'Hallock', '44 Smith Street', 'Albany', 'NY', 12084, '3475566782', '2000-06-08'),
(55, 'JThompson@gmail.com', 'TBone44', 'banana14', 'John', 'Thompson', '22 Garden Avenue', 'Holtsville', 'NY', 501, '4567098823', '1999-09-12'),
(56, 'JakeEllis@aol.com', 'JellyElly9', 'Ellis14', 'Jake', 'Ellis', '55 Rose Street', 'Babylon', 'NY', 11702, '1202202390', '2000-05-05'),
(57, 'CCorvese@gmail.com', 'Coco44', '!Coco!', 'Courtney', 'Corvese', '44 Sweet Hill Road', 'East Hampton', 'NY', 11937, '2348971223', '2001-02-01'),
(58, 'NateWinn@gmail.com', 'NateWinn', 'patch33', 'Nate', 'Winn', '17 Oak Drive', 'Patchogue', 'NY', 11722, '5167183223', '1998-05-09'),
(59, 'JohnBieber@gmail.com', 'Jbiebs', 'cooking44', 'John', 'Bieber', '33 Brook Lane', 'Buffalo', 'NY', 14201, '6329876610', '1999-08-12'),
(60, 'BunchBrandon@aol.com', 'Bunch33', '12345678', 'Brandon', 'Johnson', '11 Harbor Avenue', 'Rochester', 'NY', 14602, '2348097716', '2000-02-03'),
(61, 'NickGardone@aol.com', 'Gardone7', '7Gardone7', 'Nicholai', 'Giovanni', '302 Piper Avenue', 'San Antonio', 'TX', 78006, '8048822379', '1989-03-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attendees`
--
ALTER TABLE `Attendees`
  ADD PRIMARY KEY (`attendeeID`);

--
-- Indexes for table `EventImgs`
--
ALTER TABLE `EventImgs`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `Friendships`
--
ALTER TABLE `Friendships`
  ADD PRIMARY KEY (`friendshipID`);

--
-- Indexes for table `Invitees`
--
ALTER TABLE `Invitees`
  ADD PRIMARY KEY (`inviteeID`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `UserImgs`
--
ALTER TABLE `UserImgs`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `UserProfile`
--
ALTER TABLE `UserProfile`
  ADD PRIMARY KEY (`profileID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attendees`
--
ALTER TABLE `Attendees`
  MODIFY `attendeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `EventImgs`
--
ALTER TABLE `EventImgs`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `Friendships`
--
ALTER TABLE `Friendships`
  MODIFY `friendshipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Invitees`
--
ALTER TABLE `Invitees`
  MODIFY `inviteeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `UserImgs`
--
ALTER TABLE `UserImgs`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `UserProfile`
--
ALTER TABLE `UserProfile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
