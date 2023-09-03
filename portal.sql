-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2018 at 07:52 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `database`
--


--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `bid` int(100) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `broll` varchar(100) NOT NULL,
  `bpassword` varchar(100) NOT NULL,
  `bhash` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `bmobile` varchar(100) NOT NULL,
  `bcourse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fusername` varchar(255) NOT NULL,
  `fpassword` varchar(255) NOT NULL,
  `fhash` varchar(255) NOT NULL,
  `femail` varchar(255) NOT NULL,
  `fmobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fbook`
--

CREATE TABLE `fbook` (
  `pid` int(255) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `bcourse` varchar(255) NOT NULL,
  `fuploader` varchar(255) NOT NULL,
  `bookdesc` varchar(255) NOT NULL,
  `bdoc` varchar(255) NOT NULL DEFAULT 'blank.pdf',
  `docStatus` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `fbook`
--

CREATE TABLE `fnotice` (
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fuploader` varchar(255) NOT NULL,
  `noticedesc` varchar(255) NOT NULL,
  `bdoc` varchar(255) NOT NULL DEFAULT 'blank.pdf',
  `docStatus` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `attendance & marksheet`
--

CREATE TABLE `fmiscell` (
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bcourse` varchar(255) NOT NULL,
  `fuploader` varchar(255) NOT NULL,
  `filedesc` varchar(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `bdoc` varchar(255) NOT NULL DEFAULT 'blank.pdf',
  `docStatus` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `broll` varchar(255) NOT NULL,
  `bcourse` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `bid` (`bid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `fid` (`fid`);
  
--
-- Indexes for table `fbook`
--
ALTER TABLE `fbook`
  ADD PRIMARY KEY (`pid`);
  
--
-- Indexes for table `fnotice`
--
ALTER TABLE `fnotice`
  ADD PRIMARY KEY (`pid`);
  
--
-- Indexes for table `attendance & marksheet`
--
ALTER TABLE `fmiscell`
  ADD PRIMARY KEY (`pid`);
  
--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
--
-- AUTO_INCREMENT for table `fbook`
--
ALTER TABLE `fbook`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
--
-- AUTO_INCREMENT for table `fnotice`
--
ALTER TABLE `fnotice`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
--
-- AUTO_INCREMENT for table `attendance & marksheet`
--
ALTER TABLE `fmiscell`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;