import React from 'react';

const EmpleadoList = () => {
  const empleados = [
    { id: 1, numeroEmpleado: 'E001', nombre: 'Carlos Pérez' },
    { id: 2, numeroEmpleado: 'E002', nombre: 'Ana Rodríguez' }
  ];

  return (
    <div className="container">
      <h2>Lista de Empleados</h2>
      <table className="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Número de Empleado</th>
            <th>Nombre</th>
          </tr>
        </thead>
        <tbody>
          {empleados.map(empleado => (
            <tr key={empleado.id}>
              <td>{empleado.id}</td>
              <td>{empleado.numeroEmpleado}</td>
              <td>{empleado.nombre}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default EmpleadoList;
