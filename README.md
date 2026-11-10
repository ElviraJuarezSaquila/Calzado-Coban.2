# 👞 Sistema de Gestión Comercial e Inventario - Calzado Cobán

**Universidad Regional de Guatemala**  
**Curso:** Programación Web  
**Docente:** Ing. Carlos Avalos  
**Grupo 5:**  
* Hániel Alfredo del Valle Escobar (Carné: 2449084)
* Elvira Juarez Saquila (Carné: 24011120)

---

## 1. Descripción del Problema a Resolver
Las zapaterías comerciales requieren un control exacto sobre las variantes de su mercadería (marcas, estilos, tallas y existencias disponibles) y su relación directa con la facturación a clientes. El manejo manual o en hojas de cálculo provoca quiebres de stock, errores en el cobro y pérdida de trazabilidad de las ventas. 

**Calzado Cobán** resuelve este problema mediante una aplicación web bajo arquitectura **MVC (Modelo-Vista-Controlador)** desarrollada en **Laravel**, que centraliza el catálogo de marcas, el inventario por tallas, el directorio de clientes (con NIT) y el registro transaccional de ventas con descuento y restauración automática de stock.

## 2. Identificación de Usuarios del Sistema
* **Administrador de Tienda:** Gestiona el catálogo de marcas, administra altas/bajas/ediciones del inventario de calzado, controla precios y supervisa el historial de ventas.
* **Asesor de Ventas / Cajero:** Registra nuevos clientes por NIT, consulta disponibilidad de tallas en tiempo real y procesa ventas descontando existencias automáticamente.

## 3. Arquitectura y Entidades Relacionadas (Base de Datos)
El sistema cuenta con **4 entidades principales relacionadas** en MySQL:
1. **`clientes`**: Registro tributario y comercial (`id`, `nit`, `nombre`).
2. **`marcas`**: Catálogo de fabricantes (`id`, `nombre`). Relación `1:N` con productos.
3. **`productos`**: Inventario de calzado (`id`, `marca_id`, `nombre`, `talla`, `precio`, `stock`).
4. **`ventas`**: Registro transaccional (`id`, `cliente_id`, `producto_id`, `cantidad`, `total`). Relacionada mediante llaves foráneas con `clientes` y `productos`.

## 4. Requisitos e Instrucciones de Instalación y Ejecución
1. **Requisitos previos:** PHP 8.2+, Composer, MySQL (XAMPP) y Laravel Herd (o servidor integrado de Artisan).
2. **Clonar el repositorio y entrar a la carpeta del proyecto:**
   ```bash
   git clone <URL_DEL_REPOSITORIO>
   cd calzado-coban