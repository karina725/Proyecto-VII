import React from 'react';

const LogList = () => {
  const logs = [
    { id: 1, accion: 'Reserva creada', usuario: 'Juan Pérez', fecha: '2024-09-01' },
    { id: 2, accion: 'Liberación realizada', usuario: 'Ana Rodríguez', fecha: '2024-09-02' }
  ];

  return (
    <div className="container">
      <h2>Registro de Logs</h2>
      <table className="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Acción</th>
            <th>Usuario</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          {logs.map(log => (
            <tr key={log.id}>
              <td>{log.id}</td>
              <td>{log.accion}</td>
              <td>{log.usuario}</td>
              <td>{log.fecha}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default LogList;
