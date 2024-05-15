                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Out
                                </th>
                                <th>
                                    Nama Barang
                                </th>
                                <th>
                                    Deskripsi
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                <th>
                                    Harga
                                </th>
                                <th class="text-right">
                                    Harga Total
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            {{ $post->deleted_at->format('Y-m-d') }}
                                        </td>
                                        <td>
                                            <a href="admin.itemOut/{{ $post->slug }}">{{ $post->nama_barang }}</a>
                                        </td>
                                        <td>
                                            {{ $post->deskripsi }}
                                        </td>
                                        <td>
                                            {{ $post->jumlah }}
                                        </td>
                                        <td>
                                            {{ $post->formatRupiah('harga') }}
                                        </td>
                                        <td class="text-right">
                                            {{ $post->formatRupiah('harga_total') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>