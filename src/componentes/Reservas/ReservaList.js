import React from 'react';

const ReservaList = () => {
  const reservas = [
    { id: 1, empleado: 'Carlos Pérez', espacio: 'A001', fecha: '2024-09-01' },
    { id: 2, empleado: 'Ana Rodríguez', espacio: 'A002', fecha: '2024-09-02' }
  ];

  return (
    <div className="container">
      <h2>Lista de Reservas</h2>
      <table className="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Empleado</th>
            <th>Espacio</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          {reservas.map(reserva => (
            <tr key={reserva.id}>
              <td>{reserva.id}</td>
              <td>{reserva.empleado}</td>
              <td>{reserva.espacio}</td>
              <td>{reserva.fecha}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default ReservaList;
