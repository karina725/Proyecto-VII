import React from 'react';

const LiberacionList = () => {
  const liberaciones = [
    { id: 1, empleado: 'Carlos Pérez', espacio: 'A001', fecha: '2024-09-01', motivo: 'Trabajo remoto' },
    { id: 2, empleado: 'Ana Rodríguez', espacio: 'A002', fecha: '2024-09-02', motivo: 'Vacaciones' }
  ];

  return (
    <div className="container">
      <h2>Lista de Liberaciones</h2>
      <table className="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Empleado</th>
            <th>Espacio</th>
            <th>Fecha</th>
            <th>Motivo</th>
          </tr>
        </thead>
        <tbody>
          {liberaciones.map(liberacion => (
            <tr key={liberacion.id}>
              <td>{liberacion.id}</td>
              <td>{liberacion.empleado}</td>
              <td>{liberacion.espacio}</td>
              <td>{liberacion.fecha}</td>
              <td>{liberacion.motivo}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default LiberacionList;
