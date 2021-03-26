-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 02:52 PM
-- Server version: 5.7.32-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marcelltanure_portfolio`
--
DROP DATABASE IF EXISTS `marcelltanure_portfolio`;
CREATE DATABASE IF NOT EXISTS `marcelltanure_portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `marcelltanure_portfolio`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorId` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorId`, `firstName`, `lastName`, `emailAddress`, `password`) VALUES
(1, 'Delon', 'Van de Venter', 'delon.vandeventer@nbcc.ca', 'secret'),
(2, 'Marcell', 'Tanure', 'paganini.marcell@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(10) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `type`) VALUES
(1, 'Strings', 1),
(2, 'Variables', 1),
(3, 'Math', 1),
(4, 'C#', 2),
(5, 'Constants', 1),
(6, 'Operators', 1),
(7, 'Python', 2),
(8, 'Data Types', 1),
(9, 'Superglobals', 1),
(10, 'RegEx', 1),
(11, 'Form Handling', 1),
(12, 'JavaScript', 2),
(13, 'Kotlin', 2),
(14, 'Dart', 2),
(15, 'Date and Time', 1),
(16, 'Object Oriented Programming', 1),
(17, 'Databases', 1),
(18, 'Switch', 1),
(19, 'Arrays', 1),
(20, 'Methods', 1),
(21, 'Exceptions', 1),
(22, 'Programming Languages', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(10) NOT NULL,
  `postTitle` varchar(100) CHARACTER SET utf8 NOT NULL,
  `teaser` varchar(60) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `postImage` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `authorId` int(10) NOT NULL,
  `categoryId` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postTitle`, `teaser`, `content`, `postImage`, `post_date`, `authorId`, `categoryId`) VALUES
(1, 'first entry', 'You will never guess what happened...', 'This is where the actual post would be if there was one.', NULL, '2021-01-13 13:39:28', 1, 0),
(21, 'Why learning C#?', 'C#Â  is also one of the most popular...', '<p><strong>I</strong> feel this is one of those posts that may change in the future according to my future professional circunstances or choices made. Even so, it represents&nbsp;the path my efforts are leading me&nbsp;to in&nbsp;the current date shown in this publication and without further ado, let me present the main reasons why I chose to learn and go deep with C# as a developer.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>First of all, the course I took at NBCC (New Brunswick Community College) is C# based. Although we see a huge variety of programming languages in a 2 year window, C# is the language used by the Web &amp; Mobile App Development program to introduce us to almost all basic programming concepts. Except for mobile development, almost everyt other topic presented by the course had C# in it. And that helped build the confidence I needed to keep going and build more complex apps with it.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C#&nbsp; is also one of the most popular programming languages in the world. Sice&nbsp;its creation in 2002, it keeps growing and has a huge support among developers and companies.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It is a very easy to read and versatile language. With C# we&#39;re able to build desktop, web, mobile apps and games.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>When it comes to desktop and web development, C# is widely used by companies and it has very powerful tools that allow developers to create&nbsp;entire applications and connect them to databases&nbsp;with just a few clicks.&nbsp;&nbsp;That creates a very productive environment in which the developer will be able to quickly create the main features of a program and change it according to uses cases and business rules later.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>With Xamarin the developer has all the advantages of using C# for mobile development and most important, Xamarin is cross platform, allowing the development of mobile applications for both IOS and Android. It is still not huge a fraction of developers using it, but the Xamarin community keeps growing.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C# is also a great programming language for game developers. Unity is so powerful, that allows even game lover with very basic programming skill to build his/her own game without much code. Unity&nbsp;is definitely one of the most popular tools for building games nowadays.&nbsp;</p>\r\n', 'cSharp.jpg', '2021-02-25 16:49:42', 2, 22),
(31, 'Docker Glossary', '...open-source project for automating the deployment...', '<p><strong>T</strong>he Microsoft documentation defines Docker as &quot;an open-source project for automating the deployment of applications as portable, self-sufficient containers that can run on the cloud or on-premises. Docker is also a company that promotes and evolves this technology, working in collaboration with cloud, Linux, and Windows vendors, including Microsoft.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Here&#39;s a quick guide with the main definitions that surround Docker:</p>\r\n\r\n<p><br />\r\n<strong>Image</strong>: The image is a package that holds all dependencies that will be needed to create a container.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Container</strong>: The container is the image instantiated. It is possible create more than one container from the same image.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Dockerfile</strong>: It&#39;s a file with the script to install the programs that build a Docker image.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Volume</strong>: The images are read-only files and the programs need to write to the filesystem. The volumes allow programs to access the writable filesystem.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Repo</strong>: It has a group of images or variations of the same image. In the second case the images would be identified with tags.<br />\r\n&nbsp;<br />\r\n<strong>Tag</strong>: A label that identifies different versions of the same image.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Registry</strong>: Docker Hub provides the default registry images. Its role is to provide access to repositories. &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Docker Hub</strong>: a registry that allows developers to upload images.</p>\r\n', 'docker.jpg', '2021-03-06 02:06:11', 2, 22),
(19, 'Method parameters C#', 'Sometimes, we need to add input valuesÂ in our methods...', '<p>Sometimes, we need to add input values&nbsp;in our methods in order to perform a task. For instance, if I need a method that will calculate the area of a rectangle, we could have width and height as required inputs to call this method.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><code>static double <strong>CalculateArea</strong>(double width, double height)</code></p>\r\n\r\n<p><code>&nbsp; {</code></p>\r\n\r\n<p><code>&nbsp; &nbsp; return width * height;</code></p>\r\n\r\n<p><code>&nbsp; }</code></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>These input values are called parameters and it is possible to use as many of them as it is required to our specific needs as programmers.</p>\r\n\r\n<p>So, whenever I needed to call this method, I could just do it like this:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><code>static public void <strong>Main</strong>()&nbsp;<br />\r\n&nbsp; &nbsp; {&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; Console.<strong>WriteLine</strong>(<strong>CalculateArea</strong>(5.33, 2.75));&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp; &nbsp; }&nbsp;</code></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C# requires that the <strong>parameters </strong>are used after the method&#39;s name inside parentheses. In addition, they&#39;ll be called parameters when used as in the method itself not its call. To ilustrate this, in our method above <em>width</em> and <em>height</em> are the parameters. When the method is called, the values inside parentheses are called <strong>arguments</strong>. Back to our example, 5.33 and 2.75 are arguments passed when the method is called.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We can also assign default values to our methods.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><code>static double <strong>CalculateArea</strong>(double <em>width = 4.0</em>, double <em>height = 2.0</em>) </code></p>\r\n\r\n<p><code>&nbsp; { </code></p>\r\n\r\n<p><code>&nbsp; &nbsp; return <em>width </em>* <em>height</em>; </code></p>\r\n\r\n<p><code>&nbsp; }</code></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Now, whenever I don&#39;t pass arguments when calling this method, it will return its default value.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><code>static public void <strong>Main</strong>()&nbsp;<br />\r\n&nbsp; &nbsp; {&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; Console.<strong>WriteLine</strong>(<strong>CalculateArea</strong>());&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp; &nbsp; }&nbsp;</code></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'code.jpg', '2021-02-25 15:02:45', 2, 20),
(20, 'Sql Server data types', 'When specifying columns during table creation...', '<p><strong>W</strong>hen specifying columns during table creation, the data type choice for that column is required. It is up to developers to choose the best data according to their needs.</p>\r\n\r\n<p>The main data types in SQL are string, date and time, and numeric.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Some of the <strong>String</strong> data types are:</p>\r\n\r\n<p><em>char(n), varchar(n), text, image</em>, etc.</p>\r\n\r\n<p>The <strong>n</strong> between parentheses represents the size to be defined for the data type when declaring and setting a variable/table.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- <strong>Date and Time</strong> data types:</p>\r\n\r\n<p><em>datetime, datetime2, time, timestamp</em> etc.</p>\r\n\r\n<p><em>datetime </em>holds dates from January 1st, 1753 to December 31st, 9999 while <em>datetime2 </em>is from January 1st, 0001 to December 31, 9999. The data type <em>timestamp </em>stores a number that is updated whenever the information in the row is created or updated.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- Finally, some of the <strong>numeric</strong> datatypes are:</p>\r\n\r\n<p><em>bit, smallint, int, decimal(p, s), float</em> etc.</p>\r\n\r\n<p><em>bit </em>is the SQL representation of a boolean value. <em>smallint </em>and int allows numbers between -32,768 to&nbsp;32,767 and -2,147,483,648 to 2,147,483,647, respectively.</p>\r\n\r\n<p><em>decimal </em>has a precision&nbsp;and a scale parameter. The precision indicates the maximum amount of numbers in the the data type and the scale is the maximum number of digits to the right of the decimal point. Ex: decimal(9,2)=&gt; 1245055.99.&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'db.jpg', '2021-02-25 12:43:00', 2, 17),
(22, 'Inheritance in C#', 'The main idea behind object oriented programming is...', '<p><strong>L</strong>earning and really absorbing object oriented programming concepts was a real game changer in my college years. There are many concepts involved and they are all linked in a way that it may become hard to understand something without getting the big picture first.<br />\r\n<br />\r\nInheritance is one of those concepts.<br />\r\n<br />\r\nThe main idea behind object oriented programming is to avoid code repetition. Inheritance allows you to access properties from a base class in child classes. This way, we don&rsquo;t need repeat the same common properties in all child classes and keep a cleaner code.<br />\r\n<br />\r\nIn the example above, Electronic Items could represent an abstract class (it doesn&rsquo;t need to be instantiated) and will provide the child classes common properties and methods.<br />\r\n<br />\r\nFor instance, all electronic items may have properties, such as a &lsquo;name&rsquo;, &lsquo;release date&rsquo;, &lsquo;brand&rsquo;, &lsquo;weight&rsquo; and methods like to &lsquo;turn on&rsquo; and &lsquo;turn off&rsquo;.<br />\r\n<br />\r\nIn C#, a class can only inherit from a single class. In our example the code would look like:<br />\r\n<br />\r\nusing System;<br />\r\n<br />\r\npublic class <strong>EletronicItems</strong><br />\r\n{<br />\r\n&nbsp; &nbsp; private double weight = 8.5;<br />\r\n<br />\r\n&nbsp; &nbsp; public class <strong>Phones </strong>: <strong>EletronicItems</strong><br />\r\n&nbsp; &nbsp; {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; public double <strong>GetWeight</strong>()<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; return this.weight;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; }<br />\r\n&nbsp; &nbsp; }<br />\r\n}<br />\r\n<br />\r\n<br />\r\npublic class <strong>Example</strong><br />\r\n{<br />\r\n&nbsp; &nbsp; public static void <strong>Main</strong>(string[] args)<br />\r\n&nbsp; &nbsp; {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; var s10 = new ElectronicItems.Phones();<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; Console.WriteLine(s10.GetValue());<br />\r\n&nbsp; &nbsp; }<br />\r\n}<br />\r\n<br />\r\nIn the code above, we&rsquo;ve create the class Phones, which inherits ElectronicItems <strong>(Phones : EletronicItems)</strong>. Because of that, we have access to the property weight from our base class. Finally, we instantiated Phones (S10 in our example) and got the default value from ElectronicItems.</p>\r\n', 'inheritance.jpg', '2021-02-18 16:30:08', 2, 16),
(30, 'A quick introduction to XAML', 'XAML is an important skill to be added...', '<p><strong>E</strong>very time we create a desktop C# desktop WPF app in Visual Studio, this project&nbsp;automatically comes with XAML code in it. A file called&nbsp;MainWindow.xaml and another file called MainWindow.xaml.cs. This first file will hold the designer and code that will define&nbsp;the user interface of our app. The second one will hold the code needed to make our application work.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>XAML, similarly to HTML is a markup language. XAML stands for E<ins>x</ins>tensible <ins>A</ins>pplication <ins>M</ins>arkup <ins>L</ins>anguage.&nbsp;On the other hand,&nbsp;XAML is not code that will be interpreted by your browser. It works together with C#. It simply defines the user interface while C# defines what the program will do.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The example below creates a rectangle inside of our our grid with 100 x 200 of dimension. The unit of measurement is called device-independent pixel. This unit allows our app to look good at any device even though they have different scales.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><code>&lt;<strong>Grid</strong>&gt;</code></p>\r\n\r\n<p><code>&nbsp; &nbsp; &lt;<strong>Rectangle </strong>Fill= &quot;Gold&quot;</code></p>\r\n\r\n<p><code>&nbsp; &nbsp; Height=&quot;200&quot; Width=&quot;100&quot;/&gt;</code></p>\r\n\r\n<p><code>&lt;/<strong>Grid</strong>&gt;</code></p>\r\n\r\n<p><code><!--<strong--><!--<strong--></code></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>A Rectangle tag was added along with with its properties for color, width and height.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Fortunately, Visual Studio makes it really easy add&nbsp;new elements and to change XAML code with its ToolBox and&nbsp;Properties panel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>XAML is an important skill to be added to a developer&#39;s tool belt. It is not limited to Windows desktop applications. It is also used in mobile development for Android and IOS with Xamarin, for example (with a few small differences).&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'xaml.jpg', '2021-03-03 11:08:45', 2, 22),
(32, 'How to start working with SQL Management Studio queries', 'To execute the whole query, we can press F5...', '<p>When working with databases, we need to query them to read, update, add or delete specific data. Microsoft Management Studio (MMS) allows us to see all database information and it uses a query editor that manages Transact-SQL statements.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The query editor is a text editor and the user is able to open a new editor window in MMS by clicking on the New Query button or opening an existing file.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/d080f98a-3a9d-4180-b8e8-e5c9e948133b\" width=\"205\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It is possible to change font color, size, style, add dark mode and line numbers just to mention a few and most commonly used in MMS.</p>\r\n\r\n<p><br />\r\nIt also comes with IntelliSense with auto complete features that will show related databases, table, columns in order to make our lives as developers much easier. The IntelliSense comes with MMS by default, but it can be turned off.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/99e8ea8f-52f4-4dc5-9103-ea0fc7b9fb44\" width=\"795\" />\r\n<figcaption>IntelliSense displaying autocomplete for a table column.</figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To execute the whole query, we can press F5. Another option is to select parts of a query and press F5. MMS is able to interpret only the selected line and execute it, if no errors were found. Another option is to click the Execute button available in MMS. And it will work the same as pressing F5, wether we want to execute eveything or just a partial code.&nbsp;<br />\r\n&nbsp;</p>\r\n', 'txteditor.jpg', '2021-03-09 12:56:58', 2, 17),
(33, 'Loops in C#', 'Whenever we need to stablish a repeated system behavior...', '<p><strong>L</strong>et&#39;s suppose I&#39;m creating a system that will allow me to see all products I have in inventory. I need to show specific product information for each product and show information that will require basic calculations using the same data available. For example:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Product Name:</strong></p>\r\n\r\n<p><strong>Category:</strong></p>\r\n\r\n<p><strong>Availibility:</strong></p>\r\n\r\n<p><strong>Subtotal:</strong></p>\r\n\r\n<p><strong>Discount:</strong></p>\r\n\r\n<p><strong>Total:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>And let&#39;s suppose we need to show all that information for all 500 product in the inventory. I could set the same instructions for each product individualy, but that would be a lot of work for a simple task. On the other hand, we can set the same instruction once and make it repeat for each product until we satisfy a condition. Ex: until we reach the product amount in stock.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;Whenever we need to stablish a repeated system behavior until a certain condition is reached, loops come in handy. C#, as other programming languages, offers a variety of ways to solve the same problem, with slight differences in each method used.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>For Loop</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The for loop is the used when we provide the number of times we need our code to be looped.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><code>for (int i = 0; i &lt; 5; i++)</code></p>\r\n\r\n<p><code>{</code></p>\r\n\r\n<p><code>&nbsp; &nbsp; Console.Write($&quot;{i} - &quot;);</code></p>\r\n\r\n<p><code>}&nbsp;</code></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The code above declares a variable i and sets its value to 0&nbsp;(<code>int i = 0;</code>). The second part defines the loop condition (<code>i &lt; 5;</code>). Then, the third part is executed every time we finish&nbsp;our set&nbsp;of instructions (the code we need executed each time we loop).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The code we need executed every loop is <code>Console.Write($&quot;{i} - &quot;); </code>.<code> </code>That code will&nbsp;print our variable value (i) and - Ex: if the variable value is 1, the result printed will be &#39;1 -&#39;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The output in our code will be <code>1 - 2 - 3 - 4 -</code>.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'loop.jpg', '2021-03-13 20:16:30', 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectId` int(10) NOT NULL,
  `projectTitle` varchar(100) NOT NULL,
  `projectDesc` varchar(1000) NOT NULL,
  `projectImage` varchar(100) NOT NULL,
  `projectImage2` varchar(100) DEFAULT NULL,
  `projectImage3` varchar(100) DEFAULT NULL,
  `projectDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `authorId` int(10) NOT NULL,
  `categoryId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectId`, `projectTitle`, `projectDesc`, `projectImage`, `projectImage2`, `projectImage3`, `projectDate`, `authorId`, `categoryId`) VALUES
(1, 'NBA', '<p>Player Management with CRUD operations and N-Tier architecture. User is able to see teams by division and players by team in a gridview that allows user to choose a player for deletion. User will also be able to see a specific player by Id, update, and insert a new player.</p>\r\n\r\n<p>Content practiced: N-Tier architecture, input/output/inputOutput parameters, data annotations, concurrency, sql stored procedures.</p>\r\n\r\n<p>Content:</p>\r\n\r\n<p>*<strong>SQL</strong>* Script to create the nba database. Stored procedures used for CRUD operations.</p>\r\n\r\n<p>*<strong>C#</strong>* Models / Types / DataAccess / Repository / Service - Validation using data annotation and custom validation for minimum age requirement.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Github : <a href=\"https://github.com/marcellpaganini/nTierNBA\">https://github.com/marcellpaganini/nTierNBA</a></p>\r\n\r\n<p>Video: <a href=\"https://youtu.be/_n8g64faIas\" target=\"_blank\">https://youtu.be/_n8g64faIas</a></p>\r\n', 'nba.jpg', 'nba2.jpg', 'nba3.jpg', '2021-03-06 04:23:15', 2, 4),
(2, 'Blog', '<p>This is my&nbsp;personal blog where my wife and I show a little bit of our lives in Canada along with our Youtube channel. In this project, I was able to practice Python using the Django framework.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Content learned:</p>\r\n\r\n<p>- Model / View / Template creation</p>\r\n\r\n<p>- Database management</p>\r\n\r\n<p>- Using static files</p>\r\n\r\n<p>- Applying Bootstrap</p>\r\n\r\n<p>- Authentication</p>\r\n\r\n<p>- Applying different roles to each user</p>\r\n\r\n<p>- Adding Rich Text Editor</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Github : <a href=\"https://github.com/marcellpaganini/newGroundBlog\">https://github.com/marcellpaganini/newGroundBlog</a></p>\r\n\r\n<p>Video: <a href=\"https://youtu.be/4GVy3h56tL8\">https://youtu.be/4GVy3h56tL8</a></p>\r\n', 'newGround.jpg', 'newGround2.jpg', 'newGround3.jpg', '2021-03-06 04:43:37', 2, 7),
(3, 'Blackjack', '<p>Blackjack desktop app created to practice object oriented programming concepts in C#.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Concepts practiced:</p>\r\n\r\n<p>- Encapsulation</p>\r\n\r\n<p>- Constructors</p>\r\n\r\n<p>- Getters / setters</p>\r\n\r\n<p>- Enums</p>\r\n\r\n<p>-Accessing methods and properties from classes</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Github : <a href=\"https://github.com/marcellpaganini/MarcellTanureBlackJack\">https://github.com/marcellpaganini/MarcellTanureBlackJack</a></p>\r\n\r\n<p>Video: <a href=\"https://youtu.be/U-X3y-ubWL4\" target=\"_blank\">https://youtu.be/U-X3y-ubWL4</a></p>\r\n', 'blackjack.jpg', 'blackjack2.jpg', 'blackjack3.jpg', '2021-03-06 05:29:17', 2, 4),
(4, 'TechSchool', '<p>ASP.NET Core 3.1</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Database: SQL Server</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- This project was set up with authentication and email service.</p>\r\n\r\n<p>- Managed many to many relationship with ASP.NET core.</p>\r\n\r\n<p>- Created a paginated list with search.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Github: <a href=\"https://github.com/marcellpaganini/coreProgrammingSchool\">https://github.com/marcellpaganini/coreProgrammingSchool</a></p>\r\n\r\n<p>Video: <a href=\"https://youtu.be/gpWVBCUidtQ\" target=\"_blank\">https://youtu.be/gpWVBCUidtQ</a></p>\r\n', 'school.jpg', 'school2.jpg', 'school3.jpg', '2021-03-06 06:02:58', 2, 4),
(5, 'Trivia', '<p>Test your knowledge about Brazil with this trivia game.&nbsp;</p>\r\n\r\n<p><br />\r\nContent practiced:</p>\r\n\r\n<p><br />\r\n- User interactivity<br />\r\n- Adding fragment<br />\r\n- Conditional navigation<br />\r\n- Drawer menu with rules and about fragments<br />\r\n- Basic lifecycle methods<br />\r\n- Passing arguments using safe args<br />\r\n- Kotlin&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Github:&nbsp;<a href=\"https://github.com/marcellpaganini/brazilTrivia\">https://github.com/marcellpaganini/brazilTrivia</a></p>\r\n', 'trivia.jpg', 'trivia1.jpg', 'trivia2.jpg', '2021-03-07 03:13:30', 2, 13),
(6, 'Covid API', '<p>The app&#39;s job is to retrieve data from two APIs. The countries API shows all relevant data about all countries in the world and the Covid-19 API shows updated information, such as: cases, deaths and tests for that specific country.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Content practiced:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- APIs</p>\r\n\r\n<p>- JSON&nbsp;</p>\r\n\r\n<p>- REGEX</p>\r\n\r\n<p>- Bootstrap</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Github:&nbsp;<a href=\"https://github.com/marcellpaganini/covid_countryAPI\">https://github.com/marcellpaganini/covid_countryAPI</a></p>\r\n', 'covid.jpg', 'covid2.jpg', 'covid3.jpg', '2021-03-14 20:34:28', 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorId`),
  ADD UNIQUE KEY `id` (`authorId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `authorId` (`authorId`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectId`),
  ADD KEY `authorId` (`authorId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
