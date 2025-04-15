-- Categorías de prueba
INSERT INTO categorias (nombre, descripcion, created_at, updated_at) VALUES
('Shampoo', 'Limpia el cabello en profundidad', NOW(), NOW()),
('Acondicionador', 'Suaviza e hidrata el cabello', NOW(), NOW());

-- Condiciones de cabello de prueba
INSERT INTO condicion_cabellos (nombre, descripcion, created_at, updated_at) VALUES
('Seco', 'Cabello con poca humedad natural', NOW(), NOW()),
('Graso', 'Cabello con exceso de sebo', NOW(), NOW());

-- Tipos de cabello de prueba
INSERT INTO tipo_cabellos (nombre, descripcion, created_at, updated_at) VALUES
('Liso', 'Cabello sin ondas ni rizos', NOW(), NOW()),
('Rizado', 'Cabello con rizos definidos', NOW(), NOW());
