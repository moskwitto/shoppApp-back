-- SQLite Database Dump
-- Version: 3.36.0
-- https://www.sqlite.org/

-- Table structure for table `Categories`
CREATE TABLE `Categories` (
  `categoryID` INTEGER PRIMARY KEY AUTOINCREMENT,
  `categoryName` TEXT,
  `comissionPercentage` INTEGER
);

-- Dumping data for table `Categories`
INSERT INTO `Categories` (`categoryID`, `categoryName`, `comissionPercentage`) VALUES
(1, 'Beverages', 5),
(2, 'Kitchen Appliances', 13),
(3, 'Hair and Beauty', 9),
(4, 'DIY kits', 11),
(5, 'Electronics', 16),
(6, 'Clothing', 13);

-- Table structure for table `Customer`
CREATE TABLE `Customer` (
  `customerID` INTEGER PRIMARY  KEY AUTOINCREMENT,
  `firstName` TEXT,
  `lastName` TEXT,
  `password` TEXT,
  `role` TEXT CHECK( `role` IN ('Customer','Admin','Vendor') ) DEFAULT 'Customer',
  `email` TEXT UNIQUE,
  `registrationDate` TEXT DEFAULT CURRENT_TIMESTAMP
);

-- Dumping data for table `Customer`
INSERT INTO `Customer` (`customerID`, `firstName`, `lastName`, `password`, `role`, `email`, `registrationDate`) VALUES
(1, 'Alex', 'Lutski', '12345', 'Vendor', 'AlexLutski@gmail.com', '2024-05-06 13:09:12'),
(2, 'John ', 'Doe', '12334346', 'Customer', 'JohnDoe@pte.hu', '2024-05-06 13:41:20'),
(3, 'Antony', 'kiboko', 'kibokoko', 'Vendor', 'kibokoko@gmail.com', '2024-05-06 13:41:20');

-- Table structure for table `Orders`
CREATE TABLE `Orders` (
  `orderID` INTEGER PRIMARY KEY AUTOINCREMENT,
  `productID` INTEGER,
  `customerID` INTEGER,
  `destination` TEXT,
  `deliveryStatus` TEXT CHECK( `deliveryStatus` IN ('Pending','Delivered') ) DEFAULT 'Pending',
  `paymentStatus` TEXT CHECK( `paymentStatus` IN ('Pending','Paid') ) DEFAULT 'Pending',
  `orderAmount` TEXT,
  `orderDate` TEXT DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY(`productID`) REFERENCES `Product`(`productID`),
  FOREIGN KEY(`customerID`) REFERENCES `Customer`(`customerID`)
);

-- Dumping data for table `Orders`
INSERT INTO `Orders` (`orderID`, `productID`, `customerID`, `destination`, `deliveryStatus`, `paymentStatus`, `orderAmount`, `orderDate`) VALUES
(1, 11, 1, '7624 Mescek', 'Pending', 'Pending', '5', '2024-05-08 09:08:38'),
(2, 6, 2, '86 Janus Utca', 'Pending', 'Pending', NULL, '2024-05-08 09:08:38'),
(3, 11, 1, '7624 Mescek', 'Pending', 'Pending', '5', '2024-05-08 09:08:42'),
(4, 6, 2, '86 Janus Utca', 'Pending', 'Pending', NULL, '2024-05-08 09:08:42');

-- Table structure for table `Product`
CREATE TABLE `Product` (
  `productID` INTEGER PRIMARY KEY AUTOINCREMENT,
  `productName` TEXT,
  `categoryID` INTEGER,
  `price` INTEGER,
  `stockAmount` INTEGER,
  `vendorID` INTEGER,
  `productDescription` TEXT,
  FOREIGN KEY(`categoryID`) REFERENCES `Categories`(`categoryID`),
  FOREIGN KEY(`vendorID`) REFERENCES `Customer`(`customerID`)
);

-- Dumping data for table `Product`
INSERT INTO `Product` (`productID`, `productName`, `categoryID`, `price`, `stockAmount`, `vendorID`, `productDescription`) VALUES
(1, 'Xixo Energy Drink', 1, 400, 20, 1, 'Pure greatness'),
(3, 'Pepsi', 1, 450, 15, 1, 'Absolute greatness'),
(4, 'Iphone 6s', 5, 67000, 5, 2, 'This phone has 64 GB RAM'),
(5, 'Ganier Hair food', 3, 76540, 15, 1, 'Ganier will make your hair glow like never before'),
(6, 'Iphone 6s', 5, 67000, 5, 2, 'This phone has 64 GB RAM'),
(7, 'Ganier Hair food', 3, 76540, 15, 1, 'Ganier will make your hair glow like never before'),
(8, 'Screw Driver set', 4, 8700, 30, 1, 'Has 6 star shaped heads and two surprise ones. Buy Now!!'),
(9, 'Avocado Skin Nourisher', 3, 16200, 70, 2, 'Avocado on ya face!!'),
(10, 'Screw Driver set', 4, 8700, 30, 1, 'Has 6 star shaped heads and two surprise ones. Buy Now!!'),
(11, 'Avocado Skin Nourisher', 3, 16200, 70, 2, 'Avocado on ya face!!');
