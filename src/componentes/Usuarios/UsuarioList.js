import React from 'react';

const UsuarioList = () => {
  const usuarios = [
    { id: 1, nombre: 'Juan Pérez', email: 'juan@correo.com' },
    { id: 2, nombre: 'María García', email: 'maria@correo.com' }
  ];

  return (
    <div className="container">
      <h2>Lista de Usuarios</h2>
      <table className="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          {usuarios.map(usuario => (
            <tr key={usuario.id}>
              <td>{usuario.id}</td>
              <td>{usuario.nombre}</td>
              <td>{usuario.email}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

export default UsuarioList;
