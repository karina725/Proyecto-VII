import React from 'react';

const EstacionamientoList = () => {
  const estacionamientos = [
    { id: 1, numeroEspacio: 'A001', estado: 'DISPONIBLE' },
    { id: 2, numeroEspacio: 'A002', estado: 'OCUPADO' }
  ];

  return (
    <div className="container">
      <h2>Lista de Estacionamientos</h2>
      <table className="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Número de Espacio</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          {estacionamientos.map(espacio => (
            <tr key={espacio.id}>
              <td>{espacio.id}</td>
              <td>{espacio.numeroEspacio}</td>
              <td>{espacio.estado}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default EstacionamientoList;
