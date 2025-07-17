-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 04:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trifasica_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text NOT NULL,
  `telefono` text NOT NULL,
  `direccion` text NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `clientes`
--


-- --------------------------------------------------------

--
-- Table structure for table `construccion_mae`
--

CREATE TABLE `construccion_mae` (
  `idconstruccion` int(11) NOT NULL,
  `recibido` date DEFAULT NULL,
  `proyecto` varchar(10) NOT NULL,
  `reserva` text DEFAULT '0',
  `cuadrilla_asignada` text DEFAULT NULL,
  `monto_bs_diseno` decimal(10,2) DEFAULT 0.00,
  `nombre_proyecto` text DEFAULT NULL,
  `fiscal_asignado` text DEFAULT 'FNA',
  `inicio_estacado` date DEFAULT NULL,
  `final_estacado` date DEFAULT NULL,
  `descripcion_proyecto` text DEFAULT NULL,
  `inicio_real_const` date DEFAULT NULL,
  `fin_real_const` date DEFAULT NULL,
  `estado_redes` text DEFAULT NULL,
  `energizado` date DEFAULT NULL,
  `asbuilt_a_cre` date DEFAULT NULL,
  `monto_bs_final` decimal(10,2) DEFAULT 0.00,
  `rec_mo_recibida` date DEFAULT NULL,
  `rev_mo_env_cre` date DEFAULT NULL,
  `rec_221_222` date DEFAULT NULL,
  `conciliado` date DEFAULT NULL,
  `pagado` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `gravado` date DEFAULT NULL,
  `produccion` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `condicion` int(11) DEFAULT 1,
  `ca` text DEFAULT NULL,
  `trafo_kva` decimal(10,2) NOT NULL,
  `fecha_ultima_actualizacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `actualizado` int(11) NOT NULL DEFAULT 0,
  `ubicacion` int(11) NOT NULL DEFAULT 1 COMMENT '1=Santa Cruz, 2=Valles Cruceños',
  `monto_final_cheque` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha_emision_cre` date DEFAULT NULL,
  `fecha_estacado_a_cre` date DEFAULT NULL,
  `fecha_aprobacion_estacado` date DEFAULT NULL,
  `obs1` text DEFAULT NULL,
  `obs2` text DEFAULT NULL,
  `obs3` text DEFAULT NULL,
  `tipo_proyecto` varchar(50) DEFAULT 'Standar',
  `produccionbs` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cronograma` text NOT NULL DEFAULT '',
  `estado_avance` int(10) NOT NULL DEFAULT 0,
  `supervisor_movil` text NOT NULL DEFAULT '',
  `estado_cronograma` int(11) NOT NULL DEFAULT 0,
  `concluir` int(11) NOT NULL DEFAULT 0 COMMENT '1=concluido, 0= no concluido',
  `req_servicio` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `construccion_mae`
--


-- --------------------------------------------------------

--
-- Table structure for table `construccion_mae_estados`
--

CREATE TABLE `construccion_mae_estados` (
  `estado` int(11) NOT NULL,
  `estadosmae` varchar(50) DEFAULT NULL,
  `trisasicasrl_cre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `construccion_mae_estados`
--


-- --------------------------------------------------------

--
-- Table structure for table `materiales`
--

CREATE TABLE `materiales` (
  `id_material` int(11) NOT NULL,
  `cod_material` int(11) NOT NULL,
  `desc_material` text NOT NULL,
  `und_material` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `materiales`
--


-- --------------------------------------------------------

--
-- Table structure for table `material_proyecto`
--

CREATE TABLE `material_proyecto` (
  `id_matproy` int(11) NOT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_materiales` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `num_ref` int(11) DEFAULT NULL,
  `tipo_mov` varchar(50) DEFAULT NULL,
  `num_movil` int(11) DEFAULT NULL,
  `obs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mat_movimiento`
--

CREATE TABLE `mat_movimiento` (
  `id_proceso` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `id_trabajador2` int(11) NOT NULL,
  `fecha_mov` date DEFAULT NULL,
  `num_reg` int(11) DEFAULT NULL,
  `tipo_mov` int(11) DEFAULT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad_mat` float NOT NULL,
  `id_estado_mat` int(11) NOT NULL,
  `num_serie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `mat_movimiento`
--


-- --------------------------------------------------------

--
-- Table structure for table `mat_procesos`
--

CREATE TABLE `mat_procesos` (
  `id_proceso` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `id_trabajador2` int(11) NOT NULL,
  `fecha_mov` date DEFAULT NULL,
  `num_reg` int(11) DEFAULT NULL,
  `tipo_mov` int(11) DEFAULT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad_mat` float NOT NULL,
  `id_estado_mat` int(11) NOT NULL,
  `num_serie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `mat_procesos`
--


-- --------------------------------------------------------

--
-- Table structure for table `mat_tipoestado`
--

CREATE TABLE `mat_tipoestado` (
  `id_tipoestado` int(11) NOT NULL,
  `estado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mat_tipoestado`
--


-- --------------------------------------------------------

--
-- Table structure for table `mat_tipomov`
--

CREATE TABLE `mat_tipomov` (
  `id_tipomov` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mat_tipomov`
--


-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `productos`
--


-- --------------------------------------------------------

--
-- Table structure for table `temporal_mat`
--

CREATE TABLE `temporal_mat` (
  `id_temporalmat` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id_trabajador` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `estado` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trabajadores`
--


-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `perfil` text NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/780.jpg', 1, '2025-07-14 12:45:07', '2025-07-14 17:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ventas`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `construccion_mae`
--
ALTER TABLE `construccion_mae`
  ADD PRIMARY KEY (`idconstruccion`),
  ADD UNIQUE KEY `proyecto` (`proyecto`);

--
-- Indexes for table `construccion_mae_estados`
--
ALTER TABLE `construccion_mae_estados`
  ADD PRIMARY KEY (`estado`);

--
-- Indexes for table `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `material_proyecto`
--
ALTER TABLE `material_proyecto`
  ADD PRIMARY KEY (`id_matproy`);

--
-- Indexes for table `mat_movimiento`
--
ALTER TABLE `mat_movimiento`
  ADD PRIMARY KEY (`id_proceso`);

--
-- Indexes for table `mat_procesos`
--
ALTER TABLE `mat_procesos`
  ADD PRIMARY KEY (`id_proceso`);

--
-- Indexes for table `mat_tipoestado`
--
ALTER TABLE `mat_tipoestado`
  ADD PRIMARY KEY (`id_tipoestado`);

--
-- Indexes for table `mat_tipomov`
--
ALTER TABLE `mat_tipomov`
  ADD PRIMARY KEY (`id_tipomov`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporal_mat`
--
ALTER TABLE `temporal_mat`
  ADD PRIMARY KEY (`id_temporalmat`);

--
-- Indexes for table `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_trabajador`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `construccion_mae`
--
ALTER TABLE `construccion_mae`
  MODIFY `idconstruccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16192;

--
-- AUTO_INCREMENT for table `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1118;

--
-- AUTO_INCREMENT for table `material_proyecto`
--
ALTER TABLE `material_proyecto`
  MODIFY `id_matproy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mat_movimiento`
--
ALTER TABLE `mat_movimiento`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `mat_procesos`
--
ALTER TABLE `mat_procesos`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mat_tipoestado`
--
ALTER TABLE `mat_tipoestado`
  MODIFY `id_tipoestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mat_tipomov`
--
ALTER TABLE `mat_tipomov`
  MODIFY `id_tipomov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `temporal_mat`
--
ALTER TABLE `temporal_mat`
  MODIFY `id_temporalmat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;