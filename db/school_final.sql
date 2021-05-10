-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 09:52 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `ANAME`, `APASS`) VALUES
(1, 'admin', '1234');

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`ADID`, `NAME`, `FNAME`, `DOB`, `GEN`, `PHO`, `MAIL`, `ADDR`, `SCLASS`, `SDOC`) VALUES
(102, 'Amrit', 'Sukhchan', '0000-00-00', 'Male', '0987654321', 'amrit@gmail.com', 'SC_13 Gurugram', 'VIII', 'admission/notice1.pdf'),
(104, 'Priya', 'Tejinder', '0000-00-00', 'Female', '9083236562', 'priya@gmail.com', 'SC012334 CHD', 'IX', 'admission/notice2.pdf');

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ATID`, `HID`, `ID`, `time`, `present`, `form_status`) VALUES
(18, 1, 9101, '2021-05-07', 'Present', 1),
(19, 1, 9102, '2021-05-07', 'Absent', 1),
(20, 1, 9103, '2021-05-07', 'Absent', 1),
(21, 1, 9104, '2021-05-07', 'Absent', 1),
(22, 1, 9105, '2021-05-07', 'Absent', 1),
(24, 1, 9101, '2021-05-08', 'Absent', 1),
(25, 1, 9102, '2021-05-08', 'Absent', 1),
(26, 1, 9103, '2021-05-08', 'Absent', 1),
(27, 1, 9104, '2021-05-08', 'Absent', 1),
(28, 1, 9105, '2021-05-08', 'Absent', 1),
(32, 1, 9101, '2021-05-10', 'Absent', 1),
(33, 1, 9102, '2021-05-10', 'Absent', 1),
(34, 1, 9103, '2021-05-10', 'Absent', 1),
(35, 1, 9104, '2021-05-10', 'Absent', 1),
(36, 1, 9105, '2021-05-10', 'Absent', 1);

--
-- Dumping data for table `class_management`
--

INSERT INTO `class_management` (`CMID`, `CMNAME`, `CMPASS`) VALUES
(1, 'class_management', '123');

--
-- Dumping data for table `class_work`
--

INSERT INTO `class_work` (`CWID`, `HID`, `announcement`, `file`) VALUES
(5, 1, 'DO this for 1st term.', 'classwork/notice1.pdf'),
(16, 1, 'Updated Work is here.', 'classwork/notice2.pdf');

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`EID`, `ENAME`, `ETYPE`, `EDATE`, `SESSION`, `CLASS`, `SUB`) VALUES
(3, 'Term Exam', 'II-Term', '10-09-2021', 'FN', 'VII', 'English'),
(4, 'Term Exam', 'II-Term', '19-11-2021', 'AN', 'IX', 'Maths'),
(5, 'Term Exam', 'III-Term', '19-11-2021', 'FN', 'IX', 'Maths'),
(8, 'Term Exam', 'II-Term', '15-08-2021', 'FN', 'VIII', 'Science'),
(9, 'Maths', 'I-Term', '13-06-2018', 'FN', 'IX', 'Maths');

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`ID`, `total_fee`, `paid`, `fine`, `balance`) VALUES
(5101, 0, 0, 0, 0),
(5102, 20000, 15000, 500, 5500),
(5103, 0, 0, 0, 0),
(5104, 0, 0, 0, 0),
(5105, 0, 0, 0, 0),
(5201, 0, 0, 0, 0),
(5202, 0, 0, 0, 0),
(5203, 0, 0, 0, 0),
(5204, 0, 0, 0, 0),
(5205, 0, 0, 0, 0),
(6101, 0, 0, 0, 0),
(6102, 0, 0, 0, 0),
(6103, 0, 0, 0, 0),
(6104, 0, 0, 0, 0),
(6105, 0, 0, 0, 0),
(6201, 0, 0, 0, 0),
(6202, 0, 0, 0, 0),
(6203, 0, 0, 0, 0),
(6204, 0, 0, 0, 0),
(6205, 0, 0, 0, 0),
(7101, 0, 0, 0, 0),
(7102, 0, 0, 0, 0),
(7103, 0, 0, 0, 0),
(7104, 0, 0, 0, 0),
(7105, 0, 0, 0, 0),
(7201, 0, 0, 0, 0),
(7202, 0, 0, 0, 0),
(7203, 0, 0, 0, 0),
(7204, 0, 0, 0, 0),
(7205, 0, 0, 0, 0),
(8101, 0, 0, 0, 0),
(8102, 10000, 6000, 500, 4500),
(8103, 0, 0, 0, 0),
(8104, 0, 0, 0, 0),
(8105, 0, 0, 0, 0),
(8201, 0, 0, 0, 0),
(8202, 0, 0, 0, 0),
(8203, 10000, 6000, 500, 4500),
(8204, 10000, 6000, 500, 4500),
(8205, 0, 0, 0, 0),
(9101, 0, 0, 0, 0),
(9102, 0, 0, 0, 0),
(9103, 0, 0, 0, 0),
(9104, 0, 0, 0, 0),
(9105, 0, 0, 0, 0),
(9201, 0, 0, 0, 0),
(9202, 0, 0, 0, 0),
(9203, 10000, 7000, 500, 3500),
(9204, 0, 0, 0, 0),
(9205, 10000, 5000, 1000, 6000);

--
-- Dumping data for table `fee_management`
--

INSERT INTO `fee_management` (`FID`, `FNAME`, `FPASS`) VALUES
(1, 'fee_salary', '123');

--
-- Dumping data for table `hclass`
--

INSERT INTO `hclass` (`HID`, `TID`, `CLA`, `SEC`, `SUB`, `DAY`, `SLOT`) VALUES
(1, 3, 'IX', 'A', 'Maths', 'Tuesday', '00:30:00'),
(8, 3, 'VIII', 'B', 'Science', 'Monday', '09:14:14'),
(9, 4, 'VII', 'B', 'English', 'Wednesday', '10:14:14'),
(10, 13, 'IX', 'A', 'Science', 'Wednesday', '10:00:00');

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`MID`, `ID`, `SUB`, `MARK`, `TERM`, `CLASS`, `GRADE`) VALUES
(1, 9101, 'Hindi', '95', 'I-Term', 'IX', 'A+'),
(7, 9101, 'Maths', '90', 'I-Term', 'IX', 'A+'),
(8, 9101, 'English', '90', 'I-Term', 'IX', 'A+');

--
-- Dumping data for table `new_staff`
--

INSERT INTO `new_staff` (`NSID`, `TNAME`, `QUAL`, `PNO`, `MAIL`, `PADDR`, `IMG`) VALUES
(16, 'Sameer Sekh', 'M.Sc.', '9876543200', 'sameer@gmail.com', 'Sector-10.chd', 'new_staff/notice1.pdf'),
(17, 'Akilesh Singh', 'M.Sc.', '9997774440', 'akilesh@gmail.com', 'SC-12,CHD', 'new_staff/notice2.pdf');

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_subject`, `notice_to`, `notice_date`, `notice_file`) VALUES
(1, 'Hello everyone my name is john wick.', 'fee', '2021-05-08', 'notice/notice1.pdf'),
(2, 'Hello everyone my name is john wick.', 'student', '2021-05-08', 'notice/notice2.pdf');

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`query_no`, `ID`, `query`, `response`, `query_to`, `status`, `role`) VALUES
(1, 9102, 'WHAT IS DEADLINE FOR FEE PAYMENT?', 'June 2021', 'fee', 1, 'student'),
(2, 9102, 'Tell me fee status.', '30th of this month.', 'admin', 0, 'student'),
(3, 9101, 'I have a questioning doubt.', 'This will be solved in Class.', 'cm', 1, 'student'),
(4, 9101, 'When we get summer break.', 'June 2021', 'admin', 1, 'student'),
(5, 3, 'Want to know about certificate of a course', '\'\\\'NOT RESOLVED\\\'\'', 'admin', 0, 'teacher'),
(6, 9101, 'Tell me my fee balance.', '\'\\\'NOT RESOLVED\\\'\'', 'fee', 0, 'student'),
(7, 9101, 'Tell me my fee balance.', '\'\\\'NOT RESOLVED\\\'\'', 'fee', 0, 'student'),
(8, 3, 'What is latest tt.', 'Informed soon.', 'cm', 0, 'teacher'),
(9, 3, 'Provide the subject allotment list.', 'We will update you soon.', 'admin', 1, 'teacher');

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`SALID`, `TID`, `salary`, `credit`, `month`) VALUES
(1, 1, 0, 'NO', 'January'),
(2, 2, 0, 'NO', ''),
(3, 3, 10000, 'YES', 'March'),
(4, 3, 0, 'NO', 'January'),
(5, 5, 0, 'NO', ''),
(6, 6, 0, 'NO', ''),
(7, 7, 0, 'NO', ''),
(8, 8, 0, 'NO', ''),
(9, 9, 20000, 'YES', 'June'),
(10, 10, 0, 'NO', ''),
(11, 11, 0, 'NO', ''),
(12, 12, 20000, 'YES', ''),
(13, 13, 0, 'NO', ''),
(14, 14, 0, 'NO', ''),
(15, 3, 15000, 'NO', 'February'),
(16, 3, 20000, 'YES', 'April'),
(17, 3, 30000, 'YES', 'May'),
(18, 9, 20000, 'YES', 'May'),
(19, 9, 30000, 'NO', 'July');

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`TID`, `TNAME`, `TPASS`, `QUAL`, `PNO`, `MAIL`, `PADDR`, `IMG`) VALUES
(1, 'Ashwini Singh', '1234', 'M.Sc.', '8987674534', 'ashwini@gmail.com', 'Sector-34, Chandigarh', 'staff/1.jpg'),
(2, 'Vijay Soni', '1234', 'MCA', '9876748534', 'vijay@gmail.com', 'Sector-35, Chandigarh', 'staff/2.jpg'),
(3, 'ram', '1234', 'MCA', '9876543200', 'ram@yahoo.com', 'sector-17. chandigarh', 'staff/1.jpg'),
(4, 'Sam', '123', 'MBA', '9876543200', 'sam1@gmail.com', 'SSSS', 'staff/3.jpg'),
(5, 'Kumar', '1234', 'MCA', '6174524468', 'kumar@gmail.com', 'Sector-35, Chandigarh', 'staff/5.jpg'),
(6, 'Sanjay Singh', '1234', 'M.Sc.(Physics)', '8976452301', 'sanjay@gmail.com', 'Sector-37, Chandigarh', 'staff/6.jpg'),
(7, 'Sarojani Tripathi', '1234', 'M.Sc.', '9875689234', 'sarojani@gmail.com', 'Sector-36, Chandigarh', 'staff/7.jpg'),
(8, 'Malini Sharma', '1234', 'M.Sc.', '9928756834', 'malini@gmail.com', 'Sector-34, Chandigarh', 'staff/8.jpg'),
(9, 'Digvijay Chauhan', '1234', 'M.Sc.', '9839287564', 'digvijay@gmail.com', 'Sector-35, Chandigarh', 'staff/9.jpg'),
(10, 'Vasundhara Kapila', '1234', 'M.Sc.', '9932875684', 'vasundhara@gmail.com', 'Sector-34, Chandigarh', 'staff/10.jpg'),
(11, 'Arvind Goswami', '1234', 'M.Sc.', '8759926834', 'arvind@gmail.com', 'Sector-34, Chandigarh', 'staff/11.jpg'),
(12, 'Gurmeet Parekh', '1234', 'M.Sc.', '8375899264', 'gurmeet@gmail.com', 'Sector-35, Chandigarh', 'staff/12.jpg'),
(13, 'Ishmit Sinha', '1234', 'MCA.', '8992875634', 'ishmit@gmail.com', 'Sector-11, Chandigarh', 'staff/13.jpg'),
(14, 'Akhilesh Mehta', '1234', 'M.Sc.', '7568992834', 'akhilesh@gmail.com', 'Sector-35, Chandigarh', 'staff/14.jpg'),
(16, 'Saurav Sukla', '1234', 'M.Ed.', '9876543210', 'saurav@gmail.com', 'Sector-12,chandigarh', 'staff/16.jpg'),
(33, 'Sameer Sekh', '1234', 'M.Sc.', '9876543200', 'sameer@gmail.com', 'Sector-10.chd', 'staff/3rd_page.png');

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `NAME`, `FNAME`, `DOB`, `GEN`, `PHO`, `MAIL`, `ADDR`, `SCLASS`, `SSEC`, `SIMG`, `SPASS`) VALUES
(1, 'Anitha', 'Ram', '0000-00-00', 'Female', '9874561230', 'ram@gmail.com', 'Salem', 'III', 'C', 'student/4.jpg', 'S101'),
(4, 'Kishor', 'Ravi', '0000-00-00', 'Male', '8794561230', 'ravi@gmail.com', 'Salem', 'V', 'C', 'student/3.jpg', 'S103'),
(206, 'Amit Verma', 'Sunil Verma', '0000-00-00', 'Male', '0987654321', 'amit@gmail.com', 'SC-12, CHD', 'V', 'A', 'student/WhatsApp Image 2021-05-01 at 18.48.38.jpeg', 'RNO'),
(5101, 'Amar Singh', 'Surinder Singh', '2011-05-14', 'Male', '123457890', 'amar@gmail.com', 'Sector-12, Chandigarh', 'V', 'A', 'student/1.jpg', '01'),
(5102, 'Aman', 'Harbhajan', '2011-06-14', 'Male', '9087654321', 'aman@gmail.com', 'Sector-12, Chandigarh', 'V', 'A', 'student/2.jpg', '02'),
(5103, 'Sam', 'John', '2010-05-13', 'Male', '9988776655', 'sam@gmail.com', 'Sector-17, Chandigarh', 'V', 'A', 'student/3.jpg', '03'),
(5104, 'Aslam', 'Saleem', '2009-05-12', 'Male', '8277812345', 'aslam@gmail.com', 'Sector-12, Chandigarh', 'V', 'A', 'student/4.jpg', '04'),
(5105, 'Ankita', 'Kamal', '2011-08-10', 'Female', '9182736450', 'ankita@gmail.com', 'Sector-23, Chandigarh', 'V', 'A', 'student/5.jpg', '05'),
(5201, 'Ansh', 'Viraj Sharma', '2008-09-23', 'Male', '9911228877', 'ansh@gmail.com', 'Sector-34, Chandigarh', 'V', 'B', 'student/6.jpg', '01'),
(5202, 'Ishita', 'Harbhajan', '2011-06-14', 'Female', '9087654321', 'ishita@gmail.com', 'Sector-12, Chandigarh', 'V', 'B', 'student/7.jpg', '02'),
(5203, 'Sameer', 'Nirav Khanna', '2010-03-13', 'Male', '8899776655', 'sameer@gmail.com', 'Sector-12, Chandigarh', 'V', 'B', 'student/8.jpg', '03'),
(5204, 'Simi', 'Karan Singh', '2010-11-02', 'Female', '8678234567', 'simi@gmail.com', 'Sector-12, ', 'V', 'B', 'student/9.jpg', '04'),
(5205, 'Harshita', 'Sushil', '2009-10-28', 'Female', '9567890231', 'harshita@gmail.com', 'Sector-21, Chandigarh', 'V', 'B', 'student/10.jpg', '05'),
(6101, 'Akash', 'Rajinder Singh', '2007-05-20', 'Male', '1122334455', 'akash@gmail.com', 'Sector-17, Chandigarh', 'VI', 'A', 'student/11.jpg', '01'),
(6102, 'Liza', 'Parveen', '2008-06-20', 'Female', '9084234321', 'liza@gmail.com', 'Sector-21, Chandigarh', 'VI', 'A', 'student/12.jpg', '02'),
(6103, 'Divya', 'Karan Singh', '2007-02-15', 'Female', '9877665544', 'divya@gmail.com', 'Sector-22, Chandigarh', 'VI', 'A', 'student/13.jpg', '03'),
(6104, 'Akash', 'Narinder', '2007-09-10', 'Male', '8123488775', 'akash@gmail.com', 'Sector-22, Chandigarh', 'VI', 'A', 'student/14.jpg', '04'),
(6105, 'Inayat', 'Chaand', '2011-07-12', 'Female', '9645012345', 'inayat@gmail.com', 'Sector-23, Chandigarh', 'VI', 'A', 'student/15.jpg', '05'),
(6201, 'Anshuman', 'Virat Khanna', '2006-09-25', 'Male', '9887798765', 'anshuman@gmail.com', 'Sector-34, Chandigarh', 'VI', 'B', 'student/16.jpg', '01'),
(6202, 'Myra', 'Harsh Verma', '2008-09-14', 'Female', '9432108765', 'myra@gmail.com', 'Sector-12, Chandigarh', 'VI', 'B', 'student/17.jpg', '02'),
(6203, 'Lakhan', 'Kashish Nand', '2007-03-10', 'Male', '8865599776', 'lakhan@gmail.com', 'Sector-12, Chandigarh', 'VI', 'B', 'student/18.jpg', '03'),
(6204, 'Pihu', 'Karan Singh', '2008-11-01', 'Female', '8567678234', 'pihu@gmail.com', 'Sector-12, ', 'VI', 'B', 'student/19.jpg', '04'),
(6205, 'Vanya', 'Deepak Sharma', '2007-10-25', 'Female', '9231567890', 'vanya@gmail.com', 'Sector-21, Chandigarh', 'VI', 'B', 'student/20.jpg', '05'),
(7101, 'Dishu', 'Harwinder Singh', '2006-05-26', 'Male', '9987654321', 'dishu@gmail.com', 'Sector-34, Chandigarh', 'VII', 'A', 'student/21.jpg', '01'),
(7102, 'Prisha', 'Manoj Gupta', '2006-09-01', 'Female', '9021842343', 'prisha@gmail.com', 'Sector-21, Chandigarh', 'VII', 'A', 'student/22.jpg', '02'),
(7103, 'Trisha', 'Ashwani Arora', '2006-10-20', 'Female', '9658776544', 'trisha@gmail.com', 'Sector-35, Chandigarh', 'VII', 'A', 'student/23.jpg', '03'),
(7104, 'Reyansh', 'Paritosh Sahni', '2006-08-19', 'Male', '8481238775', 'reyansh@gmail.com', 'Sector-32, Chandigarh', 'VII', 'A', 'student/24.jpg', '04'),
(7105, 'Taara', 'Dev Rai', '2006-07-20', 'Female', '9634501245', 'taara@gmail.com', 'Sector-42, Chandigarh', 'VII', 'A', 'student/25.jpg', '05'),
(7201, 'Udit', 'Gaurav Kumar', '2005-09-25', 'Male', '9876877985', 'udit@gmail.com', 'Sector-34, Chandigarh', 'VII', 'B', 'student/26.jpg', '01'),
(7202, 'Jainisha', 'Yash Oberoi', '2006-10-14', 'Female', '9087643215', 'jainisha@gmail.com', 'Sector-12, Chandigarh', 'VII', 'B', 'student/27.jpg', '02'),
(7203, 'Vihan', 'Anwar Ahuja', '2007-05-10', 'Male', '8896559776', 'vihan@gmail.com', 'Sector-15, Chandigarh', 'VII', 'B', 'student/28.jpg', '03'),
(7204, 'Bhriti', 'Mahesh Babu', '2008-12-12', 'Female', '8256767834', 'bhriti@gmail.com', 'Sector-17, ', 'VII', 'B', 'student/29.jpg', '04'),
(7205, 'Zoya', 'Samrat Rathore', '2005-04-25', 'Female', '9823156790', 'zoya@gmail.com', 'Sector-22, Chandigarh', 'VII', 'B', 'student/30.jpg', '05'),
(8101, 'Avinash', 'Dev Dikshit', '2005-07-23', 'Male', '7843523414', 'avinash@gmail.com', 'Sector-19, Chandigarh', 'VIII', 'A', 'student/31.jpg', '01'),
(8102, 'Sara', 'Shiva Sinha', '2005-06-20', 'Female', '8842343821', 'shiva@gmail.com', 'Sector-21, Chandigarh', 'VIII', 'A', 'student/32.jpg', '02'),
(8103, 'Dhurvi', 'Anoop Thakur', '2005-02-14', 'Female', '9877665544', 'dhurvi@gmail.com', 'Sector-23, Chandigarh', 'VIII', 'A', 'student/33.jpg', '03'),
(8104, 'Shaurya', 'Rudra Partap', '2005-09-10', 'Male', '8751234887', 'shaurya@gmail.com', 'Sector-21, Chandigarh', 'VIII', 'A', 'student/34.jpg', '04'),
(8201, 'Ayan', 'Arjun Khagta', '2005-10-25', 'Male', '9779876588', 'ayan@gmail.com', 'Sector-34, Chandigarh', 'VIII', 'B', 'student/36.jpg', '01'),
(8202, 'Avni', 'Rohan Kakkar', '2006-04-10', 'Female', '9473210865', 'avni@gmail.com', 'Sector-12, Chandigarh', 'VIII', 'B', 'student/37.jpg', '02'),
(8203, 'Ranveer', 'Desh Pandey', '2005-03-22', 'Male', '8786559976', 'ranveer@gmail.com', 'Sector-12, Chandigarh', 'VIII', 'B', 'student/38.jpg', '03'),
(8204, 'Aditya', 'Anuj Bakshi', '2004-12-01', 'Female', '6576782384', 'aditya@gmail.com', 'Sector-34 ', 'VIII', 'B', 'student/39.jpg', '04'),
(8205, 'Arushi', 'Tarun Singh', '2004-11-04', 'Female', '9892315670', 'arushi@gmail.com', 'Sector-21, Chandigarh', 'VIII', 'B', 'student/40.jpg', '05'),
(9101, 'Taksh', 'Surya Singh', '2003-04-20', 'Male', '9876543210', 'taksh@gmail.com', 'Sector-19, Chandigarh', 'IX', 'A', 'student/1.jpg', '11'),
(9102, 'Radhika', 'Amar Verma', '2004-06-22', 'Female', '8842343921', 'radhika@gmail.com', 'Sector-22, Chandigarh', 'IX', 'A', 'student/42.jpg', '02'),
(9103, 'Shivani', 'Daksh Kansal', '2003-02-18', 'Female', '8776655494', 'shivani@gmail.com', 'Sector-22, Chandigarh', 'IX', 'A', 'student/43.jpg', '03'),
(9104, 'Parth', 'Jagdish Malhotra', '2003-09-10', 'Male', '8878123475', 'parth@gmail.com', 'Sector-22, Chandigarh', 'IX', 'A', 'student/44.jpg', '04'),
(9105, 'Soumya', 'Amrinder Singh', '2005-10-12', 'Female', '6450129345', 'soumya@gmail.com', 'Sector-23, Chandigarh', 'IX', 'A', 'student/45.jpg', '05'),
(9201, 'Vibu', 'Sarbhjit Khanna ', '2003-09-28', 'Male', '8779898765', 'vibu@gmail.com', 'Sector-34, Chandigarh', 'IX', 'B', 'student/46.jpg', '01'),
(9202, 'Rohini', 'Ronit Roy', '2002-10-14', 'Female', '9465321087', 'rohini@gmail.com', 'Sector-12, Chandigarh', 'IX', 'B', 'student/47.jpg', '02'),
(9203, 'Umang', 'Utkarsh Vasu', '2004-07-10', 'Male', '8655997876', 'umang@gmail.com', 'Sector-22, Chandigarh', 'IX', 'B', 'student/48.jpg', '03'),
(9204, 'Mishti', 'Prithvi Singh', '2002-12-01', 'Female', '7678238564', 'mishti@gmail.com', 'Sector-26, ', 'IX', 'B', 'student/49.jpg', '04'),
(9205, 'Saisha', 'Hitesh Bhardwaj', '2003-10-27', 'Female', '6789923150', 'saisha@gmail.com', 'Sector-28, Chandigarh', 'IX', 'B', 'student/50.jpg', '05'),
(10101, 'Anish', 'Rahul Roy', '2002-05-22', 'Male', '8877643219', 'anish@gmail.com', 'Sector-17, Chandigarh', 'X', 'A', 'student/51.jpg', '01'),
(10102, 'Priya', 'Krishna Kaul', '2002-06-10', 'Female', '9234320841', 'priya@gmail.com', 'Sector-21, Chandigarh', 'X', 'A', 'student/52.jpg', '02'),
(10103, 'Vasudha', 'Mahesh Dutt', '2002-03-15', 'Female', '9544877665', 'vasudha@gmail.com', 'Sector-22, Chandigarh', 'X', 'A', 'student/53.jpg', '03'),
(10104, 'Ishit', 'Ashutosh Rana', '2003-05-13', 'Male', '2348877815', 'ishit@gmail.com', 'Sector-22, Chandigarh', 'X', 'A', 'student/54.jpg', '04'),
(10105, 'Jiya', 'Sunil Mehta', '2002-07-18', 'Female', '6450123945', 'jiya@gmail.com', 'Sector-23, Chandigarh', 'X', 'A', 'student/55.jpg', '05'),
(10201, 'Sahil', 'Bharat Goyal', '2003-04-25', 'Male', '9876598877', 'sahil@gmail.com', 'Sector-34, Chandigarh', 'X', 'B', 'student/56.jpg', '01'),
(10202, 'Kavya', 'Arun Kansal', '2002-09-19', 'Female', '9764321085', 'kavya@gmail.com', 'Sector-12, Chandigarh', 'X', 'B', 'student/57.jpg', '02'),
(10203, 'Saachi', 'Shobit Raval', '2004-10-10', 'Male', '8866559977', 'saachi@gmail.com', 'Sector-12, Chandigarh', 'X', 'B', 'student/58.jpg', '03'),
(10204, 'Ishika', 'Alwar Sisodia', '0000-00-00', 'Female', '8582676734', 'ishika@gmail.com', 'Sector-12, ', 'X', 'B', 'student/59.jpg', '04'),
(10205, 'Divyanka', 'Javed Jaffery', '2003-10-24', 'Female', '2315679890', 'divyanka@gmail.com', 'Sector-21, Chandigarh', 'X', 'B', 'student/60.jpg', '05'),
(10206, 'Sahil Singh', 'Balwinder Singh', '0000-00-00', 'Male', '0987654331', 'sahil@gmail.com', 'SC_34 CHD', 'III', 'A', 'student/WhatsApp Image 2021-05-01 at 18.52.08.jpeg', '1234');

--
-- Dumping data for table `work_submission`
--

INSERT INTO `work_submission` (`WSID`, `CWID`, `ID`, `work_file`, `submission_status`, `Mark`) VALUES
(1, 5, 9101, 'worksubmission/notice1.pdf', 'Submitted', 70);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
