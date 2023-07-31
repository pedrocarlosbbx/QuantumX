import React, { useEffect, useState } from 'react';
import axios from 'axios';

export default function Home() {
  const [articles, setArticles] = useState([]);

  useEffect(() => {
    // Panggil API menggunakan Axios
    axios.get('http://localhost:8000/api/user/articles')
      .then((response) => {
        // Set data artikel ke state
        setArticles(response.data);
      })
      .catch((error) => {
        console.error('Error fetching articles:', error);
      });
  }, []);

  return (
    <div>
      <h1>HOME</h1>
      {articles.length > 0 ? (
        <ul>
          {articles.map((article) => (
            <li key={article.id}>
              <h3>{article.article_title}</h3>
              <p>Content: {article.text}</p>
              {/* Tambahkan atribut lainnya sesuai dengan nama kolom pada tabel */}
              {/* Contoh: <p>Tanggal Publikasi: {article.published_at}</p> */}
            </li>
          ))}
        </ul>
      ) : (
        <p>Belum ada artikel yang tersedia.</p>
      )}
    </div>
  );
}
