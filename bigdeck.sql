--
-- Database: `bigdeck`
--
CREATE DATABASE IF NOT EXISTS `bigdeck` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bigdeck`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `rarity_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cards`
--

INSERT INTO `cards` (`id`, `name`, `cost`, `rarity_id`, `type_id`, `race_id`, `class_id`, `image`) VALUES
(1, 'Malygos', 10, 4, 1, 3, 10, '356a192b7913b04c54574d18c28d46e6395428ab.jpg'),
(2, 'Alextrasza', 9, 4, 1, 3, 10, 'da4b9237bacccdf19c0760cab7aec4a8359010b0.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `classes`
--

INSERT INTO `classes` (`id`, `name`) VALUES
(1, 'Druid'),
(2, 'Hunter'),
(3, 'Mage'),
(4, 'Rogue'),
(5, 'Priest'),
(6, 'Paladin'),
(7, 'Warlock'),
(8, 'Shaman'),
(9, 'Warrior'),
(10, 'Neutral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `races`
--

CREATE TABLE `races` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `races`
--

INSERT INTO `races` (`id`, `name`) VALUES
(1, 'Beast'),
(2, 'Demon'),
(3, 'Dragon'),
(4, 'Elemental'),
(6, 'Mech'),
(7, 'Neutral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rarities`
--

CREATE TABLE `rarities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rarities`
--

INSERT INTO `rarities` (`id`, `name`) VALUES
(1, 'Commom'),
(2, 'Rare'),
(3, 'Epic'),
(4, 'Legendary');

-- --------------------------------------------------------

--
-- Estrutura da tabela `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Minion'),
(2, 'Spell');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rarities`
--
ALTER TABLE `rarities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `races`
--
ALTER TABLE `races`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rarities`
--
ALTER TABLE `rarities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;