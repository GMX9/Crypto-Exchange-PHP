SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `geral` (
  `id` int(11) NOT NULL,
  `titulo` varchar(2000) NOT NULL,
  `titulo_en` text NOT NULL,
  `key` text NOT NULL,
  `data_w` text NOT NULL,
  `ordem` int(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `date` varchar(300) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `payinaddress` text NOT NULL,
  `payoutaddress` text NOT NULL,
  `pair` text NOT NULL,
  `sendamount` text NOT NULL,
  `receiveamount` text NOT NULL,
  `hash` text NOT NULL,
  `verified` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `rank` int(255) DEFAULT NULL,
  `verified` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `geral`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `geral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;
