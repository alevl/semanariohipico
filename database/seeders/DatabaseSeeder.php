<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
   	    date_default_timezone_set('America/Caracas');

        \App\Models\Trato::create(['trato'=>'Normal']);
        \App\Models\Trato::create(['trato'=>'VIP']);

        \App\Models\Correlativo::create(['numero'=>1]);
        \App\Models\Correlativo::create(['numero'=>2]);
        \App\Models\Correlativo::create(['numero'=>3]);
        \App\Models\Correlativo::create(['numero'=>4]);
        \App\Models\Correlativo::create(['numero'=>5]);
        \App\Models\Correlativo::create(['numero'=>6]);
        \App\Models\Correlativo::create(['numero'=>7]);
        \App\Models\Correlativo::create(['numero'=>8]);
        \App\Models\Correlativo::create(['numero'=>9]);
        \App\Models\Correlativo::create(['numero'=>10]);
        \App\Models\Correlativo::create(['numero'=>11]);
        \App\Models\Correlativo::create(['numero'=>12]);
        \App\Models\Correlativo::create(['numero'=>13]);
        \App\Models\Correlativo::create(['numero'=>14]);
        \App\Models\Correlativo::create(['numero'=>15]);
        \App\Models\Correlativo::create(['numero'=>16]);
        \App\Models\Correlativo::create(['numero'=>17]);

        \App\Models\Operacione::create(['operacion'=>'Debito']);
        \App\Models\Operacione::create(['operacion'=>'Crédito']);

        \App\Models\Origene::create(['origen'=>'Taquilla']);
        \App\Models\Origene::create(['origen'=>'Online']);

        \App\Models\Nivele::create(['nivel'=>'Usuario']);
        \App\Models\Nivele::create(['nivel'=>'Admin']);
        \App\Models\Nivele::create(['nivel'=>'Taquilla']);

        \App\Models\EstatusUsuario::create(['estatus'=>'Activo']);
        \App\Models\EstatusUsuario::create(['estatus'=>'Inactivo']);

        \App\Models\EstatusCarrera::create(['estatus'=>'Abierta']);
        \App\Models\EstatusCarrera::create(['estatus'=>'Cerrada']);

        \App\Models\EstatusRecarga::create(['estatus'=>'Pendiente']);
        \App\Models\EstatusRecarga::create(['estatus'=>'Procesado']);

        \App\Models\EstatusPolla::create(['estatus'=>'Preparando']);
        \App\Models\EstatusPolla::create(['estatus'=>'Abierta']);
        \App\Models\EstatusPolla::create(['estatus'=>'En Juego']);
        \App\Models\EstatusPolla::create(['estatus'=>'Finalizada']);
        \App\Models\EstatusPolla::create(['estatus'=>'Participando']);

        \App\Models\EstatusRemate::create(['estatus'=>'Preparando']);
        \App\Models\EstatusRemate::create(['estatus'=>'Abierto']);
        \App\Models\EstatusRemate::create(['estatus'=>'Cerrado']);
        \App\Models\EstatusRemate::create(['estatus'=>'Finalizado']);

        \App\Models\EstatusTicket::create(['estatus'=>'Pendiente']);
        \App\Models\EstatusTicket::create(['estatus'=>'Apostado']);
        \App\Models\EstatusTicket::create(['estatus'=>'Ganador']);
        \App\Models\EstatusTicket::create(['estatus'=>'Perdedor']);
        \App\Models\EstatusTicket::create(['estatus'=>'Pagado']);
        \App\Models\EstatusTicket::create(['estatus'=>'Anulado']);
        \App\Models\EstatusTicket::create(['estatus'=>'Devolución']);

        \App\Models\TipoApuesta::create(['apuesta'=>'Gan']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Sho']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Sho']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Exa']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Exa']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Sho, Exa']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Sho, Exa']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Tri']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Tri']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Sho, Tri']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Sho, Tri']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Exa, Tri']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Exa, Tri']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Sho, Exa, Tri']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Sho, Exa, Tri']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Sho, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Sho, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Exa, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Exa, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Sho, Exa, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Sho, Exa, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Tri, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Tri, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Sho, Tri, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Sho, Tri, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Exa, Tri, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Exa, Tri, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Sho, Exa, Tri, Sup']);
        \App\Models\TipoApuesta::create(['apuesta'=>'Gan, Pla, Sho, Exa, Tri, Sup']);

        \App\Models\Hipodromo::create(['hipodromo'=>'La Rinconada']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Valencia']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Gulfstream Park']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Aqueduct']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Santa Anita']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Golden Gate']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Parx Racing']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Tampa Bay']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Fair Grounds']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Rancho Alegre']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Saratoga Race']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Keeneland']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Churchill Downs']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Finger Lakes']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Oaklawn Park']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Louisiana Downs']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Del Mar']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Thistledown']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Dover Downs']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Canterbury Park']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Presque Isle Downs']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Ruidoso Downs']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Lone Star']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Emerald Downs']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Monmouth Park']);
        \App\Models\Hipodromo::create(['hipodromo'=>'The Red Mile']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Prairie Meadows']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Penn National ']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Laurel Park']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Charles Town']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Evangeline Downs']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Horseshoe Indianapolis']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Woodbine']);
        \App\Models\Hipodromo::create(['hipodromo'=>'King Abdulaziz']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Delta Downs']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Mahonig Valley']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Remington Park']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Zia Park']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Will Rogers']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Mountaineer']);
        \App\Models\Hipodromo::create(['hipodromo'=>'Assiniboia']);

        \App\Models\Caballo::create(['caballo'=>1]);
        \App\Models\Caballo::create(['caballo'=>2]);
        \App\Models\Caballo::create(['caballo'=>3]);
        \App\Models\Caballo::create(['caballo'=>4]);
        \App\Models\Caballo::create(['caballo'=>5]);
        \App\Models\Caballo::create(['caballo'=>6]);
        \App\Models\Caballo::create(['caballo'=>7]);
        \App\Models\Caballo::create(['caballo'=>8]);
        \App\Models\Caballo::create(['caballo'=>9]);
        \App\Models\Caballo::create(['caballo'=>10]);
        \App\Models\Caballo::create(['caballo'=>11]);
        \App\Models\Caballo::create(['caballo'=>12]);
        \App\Models\Caballo::create(['caballo'=>13]);
        \App\Models\Caballo::create(['caballo'=>14]);
        \App\Models\Caballo::create(['caballo'=>15]);
        \App\Models\Caballo::create(['caballo'=>16]);
        \App\Models\Caballo::create(['caballo'=>17]);

        \App\Models\Hora::create(['hora'=>'10:00']);
        \App\Models\Hora::create(['hora'=>'10:01']);
        \App\Models\Hora::create(['hora'=>'10:02']);
        \App\Models\Hora::create(['hora'=>'10:03']);
        \App\Models\Hora::create(['hora'=>'10:04']);
        \App\Models\Hora::create(['hora'=>'10:05']);
        \App\Models\Hora::create(['hora'=>'10:06']);
        \App\Models\Hora::create(['hora'=>'10:07']);
        \App\Models\Hora::create(['hora'=>'10:08']);
        \App\Models\Hora::create(['hora'=>'10:09']);
        \App\Models\Hora::create(['hora'=>'10:10']);
        \App\Models\Hora::create(['hora'=>'10:11']);
        \App\Models\Hora::create(['hora'=>'10:12']);
        \App\Models\Hora::create(['hora'=>'10:13']);
        \App\Models\Hora::create(['hora'=>'10:14']);
        \App\Models\Hora::create(['hora'=>'10:15']);
        \App\Models\Hora::create(['hora'=>'10:16']);
        \App\Models\Hora::create(['hora'=>'10:17']);
        \App\Models\Hora::create(['hora'=>'10:18']);
        \App\Models\Hora::create(['hora'=>'10:19']);
        \App\Models\Hora::create(['hora'=>'10:20']);
        \App\Models\Hora::create(['hora'=>'10:21']);
        \App\Models\Hora::create(['hora'=>'10:22']);
        \App\Models\Hora::create(['hora'=>'10:23']);
        \App\Models\Hora::create(['hora'=>'10:24']);
        \App\Models\Hora::create(['hora'=>'10:25']);
        \App\Models\Hora::create(['hora'=>'10:26']);
        \App\Models\Hora::create(['hora'=>'10:27']);
        \App\Models\Hora::create(['hora'=>'10:28']);
        \App\Models\Hora::create(['hora'=>'10:29']);
        \App\Models\Hora::create(['hora'=>'10:30']);
        \App\Models\Hora::create(['hora'=>'10:31']);
        \App\Models\Hora::create(['hora'=>'10:32']);
        \App\Models\Hora::create(['hora'=>'10:33']);
        \App\Models\Hora::create(['hora'=>'10:34']);
        \App\Models\Hora::create(['hora'=>'10:35']);
        \App\Models\Hora::create(['hora'=>'10:36']);
        \App\Models\Hora::create(['hora'=>'10:37']);
        \App\Models\Hora::create(['hora'=>'10:38']);
        \App\Models\Hora::create(['hora'=>'10:39']);
        \App\Models\Hora::create(['hora'=>'10:40']);
        \App\Models\Hora::create(['hora'=>'10:41']);
        \App\Models\Hora::create(['hora'=>'10:42']);
        \App\Models\Hora::create(['hora'=>'10:43']);
        \App\Models\Hora::create(['hora'=>'10:44']);
        \App\Models\Hora::create(['hora'=>'10:45']);
        \App\Models\Hora::create(['hora'=>'10:46']);
        \App\Models\Hora::create(['hora'=>'10:47']);
        \App\Models\Hora::create(['hora'=>'10:48']);
        \App\Models\Hora::create(['hora'=>'10:49']);
        \App\Models\Hora::create(['hora'=>'10:50']);
        \App\Models\Hora::create(['hora'=>'10:51']);
        \App\Models\Hora::create(['hora'=>'10:52']);
        \App\Models\Hora::create(['hora'=>'10:53']);
        \App\Models\Hora::create(['hora'=>'10:54']);
        \App\Models\Hora::create(['hora'=>'10:55']);
        \App\Models\Hora::create(['hora'=>'10:56']);
        \App\Models\Hora::create(['hora'=>'10:57']);
        \App\Models\Hora::create(['hora'=>'10:58']);
        \App\Models\Hora::create(['hora'=>'10:59']);
        \App\Models\Hora::create(['hora'=>'11:00']);
        \App\Models\Hora::create(['hora'=>'11:01']);
        \App\Models\Hora::create(['hora'=>'11:02']);
        \App\Models\Hora::create(['hora'=>'11:03']);
        \App\Models\Hora::create(['hora'=>'11:04']);
        \App\Models\Hora::create(['hora'=>'11:05']);
        \App\Models\Hora::create(['hora'=>'11:06']);
        \App\Models\Hora::create(['hora'=>'11:07']);
        \App\Models\Hora::create(['hora'=>'11:08']);
        \App\Models\Hora::create(['hora'=>'11:09']);
        \App\Models\Hora::create(['hora'=>'11:10']);
        \App\Models\Hora::create(['hora'=>'11:11']);
        \App\Models\Hora::create(['hora'=>'11:12']);
        \App\Models\Hora::create(['hora'=>'11:13']);
        \App\Models\Hora::create(['hora'=>'11:14']);
        \App\Models\Hora::create(['hora'=>'11:15']);
        \App\Models\Hora::create(['hora'=>'11:16']);
        \App\Models\Hora::create(['hora'=>'11:17']);
        \App\Models\Hora::create(['hora'=>'11:18']);
        \App\Models\Hora::create(['hora'=>'11:19']);
        \App\Models\Hora::create(['hora'=>'11:20']);
        \App\Models\Hora::create(['hora'=>'11:21']);
        \App\Models\Hora::create(['hora'=>'11:22']);
        \App\Models\Hora::create(['hora'=>'11:23']);
        \App\Models\Hora::create(['hora'=>'11:24']);
        \App\Models\Hora::create(['hora'=>'11:25']);
        \App\Models\Hora::create(['hora'=>'11:26']);
        \App\Models\Hora::create(['hora'=>'11:27']);
        \App\Models\Hora::create(['hora'=>'11:28']);
        \App\Models\Hora::create(['hora'=>'11:29']);
        \App\Models\Hora::create(['hora'=>'11:30']);
        \App\Models\Hora::create(['hora'=>'11:31']);
        \App\Models\Hora::create(['hora'=>'11:32']);
        \App\Models\Hora::create(['hora'=>'11:33']);
        \App\Models\Hora::create(['hora'=>'11:34']);
        \App\Models\Hora::create(['hora'=>'11:35']);
        \App\Models\Hora::create(['hora'=>'11:36']);
        \App\Models\Hora::create(['hora'=>'11:37']);
        \App\Models\Hora::create(['hora'=>'11:38']);
        \App\Models\Hora::create(['hora'=>'11:39']);
        \App\Models\Hora::create(['hora'=>'11:40']);
        \App\Models\Hora::create(['hora'=>'11:41']);
        \App\Models\Hora::create(['hora'=>'11:42']);
        \App\Models\Hora::create(['hora'=>'11:43']);
        \App\Models\Hora::create(['hora'=>'11:44']);
        \App\Models\Hora::create(['hora'=>'11:45']);
        \App\Models\Hora::create(['hora'=>'11:46']);
        \App\Models\Hora::create(['hora'=>'11:47']);
        \App\Models\Hora::create(['hora'=>'11:48']);
        \App\Models\Hora::create(['hora'=>'11:49']);
        \App\Models\Hora::create(['hora'=>'11:50']);
        \App\Models\Hora::create(['hora'=>'11:51']);
        \App\Models\Hora::create(['hora'=>'11:52']);
        \App\Models\Hora::create(['hora'=>'11:53']);
        \App\Models\Hora::create(['hora'=>'11:54']);
        \App\Models\Hora::create(['hora'=>'11:55']);
        \App\Models\Hora::create(['hora'=>'11:56']);
        \App\Models\Hora::create(['hora'=>'11:57']);
        \App\Models\Hora::create(['hora'=>'11:58']);
        \App\Models\Hora::create(['hora'=>'11:59']);
        \App\Models\Hora::create(['hora'=>'12:00']);
        \App\Models\Hora::create(['hora'=>'12:01']);
        \App\Models\Hora::create(['hora'=>'12:02']);
        \App\Models\Hora::create(['hora'=>'12:03']);
        \App\Models\Hora::create(['hora'=>'12:04']);
        \App\Models\Hora::create(['hora'=>'12:05']);
        \App\Models\Hora::create(['hora'=>'12:06']);
        \App\Models\Hora::create(['hora'=>'12:07']);
        \App\Models\Hora::create(['hora'=>'12:08']);
        \App\Models\Hora::create(['hora'=>'12:09']);
        \App\Models\Hora::create(['hora'=>'12:10']);
        \App\Models\Hora::create(['hora'=>'12:11']);
        \App\Models\Hora::create(['hora'=>'12:12']);
        \App\Models\Hora::create(['hora'=>'12:13']);
        \App\Models\Hora::create(['hora'=>'12:14']);
        \App\Models\Hora::create(['hora'=>'12:15']);
        \App\Models\Hora::create(['hora'=>'12:16']);
        \App\Models\Hora::create(['hora'=>'12:17']);
        \App\Models\Hora::create(['hora'=>'12:18']);
        \App\Models\Hora::create(['hora'=>'12:19']);
        \App\Models\Hora::create(['hora'=>'12:20']);
        \App\Models\Hora::create(['hora'=>'12:21']);
        \App\Models\Hora::create(['hora'=>'12:22']);
        \App\Models\Hora::create(['hora'=>'12:23']);
        \App\Models\Hora::create(['hora'=>'12:24']);
        \App\Models\Hora::create(['hora'=>'12:25']);
        \App\Models\Hora::create(['hora'=>'12:26']);
        \App\Models\Hora::create(['hora'=>'12:27']);
        \App\Models\Hora::create(['hora'=>'12:28']);
        \App\Models\Hora::create(['hora'=>'12:29']);
        \App\Models\Hora::create(['hora'=>'12:30']);
        \App\Models\Hora::create(['hora'=>'12:31']);
        \App\Models\Hora::create(['hora'=>'12:32']);
        \App\Models\Hora::create(['hora'=>'12:33']);
        \App\Models\Hora::create(['hora'=>'12:34']);
        \App\Models\Hora::create(['hora'=>'12:35']);
        \App\Models\Hora::create(['hora'=>'12:36']);
        \App\Models\Hora::create(['hora'=>'12:37']);
        \App\Models\Hora::create(['hora'=>'12:38']);
        \App\Models\Hora::create(['hora'=>'12:39']);
        \App\Models\Hora::create(['hora'=>'12:40']);
        \App\Models\Hora::create(['hora'=>'12:41']);
        \App\Models\Hora::create(['hora'=>'12:42']);
        \App\Models\Hora::create(['hora'=>'12:43']);
        \App\Models\Hora::create(['hora'=>'12:44']);
        \App\Models\Hora::create(['hora'=>'12:45']);
        \App\Models\Hora::create(['hora'=>'12:46']);
        \App\Models\Hora::create(['hora'=>'12:47']);
        \App\Models\Hora::create(['hora'=>'12:48']);
        \App\Models\Hora::create(['hora'=>'12:49']);
        \App\Models\Hora::create(['hora'=>'12:50']);
        \App\Models\Hora::create(['hora'=>'12:51']);
        \App\Models\Hora::create(['hora'=>'12:52']);
        \App\Models\Hora::create(['hora'=>'12:53']);
        \App\Models\Hora::create(['hora'=>'12:54']);
        \App\Models\Hora::create(['hora'=>'12:55']);
        \App\Models\Hora::create(['hora'=>'12:56']);
        \App\Models\Hora::create(['hora'=>'12:57']);
        \App\Models\Hora::create(['hora'=>'12:58']);
        \App\Models\Hora::create(['hora'=>'12:59']);
        \App\Models\Hora::create(['hora'=>'13:00']);
        \App\Models\Hora::create(['hora'=>'13:01']);
        \App\Models\Hora::create(['hora'=>'13:02']);
        \App\Models\Hora::create(['hora'=>'13:03']);
        \App\Models\Hora::create(['hora'=>'13:04']);
        \App\Models\Hora::create(['hora'=>'13:05']);
        \App\Models\Hora::create(['hora'=>'13:06']);
        \App\Models\Hora::create(['hora'=>'13:07']);
        \App\Models\Hora::create(['hora'=>'13:08']);
        \App\Models\Hora::create(['hora'=>'13:09']);
        \App\Models\Hora::create(['hora'=>'13:10']);
        \App\Models\Hora::create(['hora'=>'13:11']);
        \App\Models\Hora::create(['hora'=>'13:12']);
        \App\Models\Hora::create(['hora'=>'13:13']);
        \App\Models\Hora::create(['hora'=>'13:14']);
        \App\Models\Hora::create(['hora'=>'13:15']);
        \App\Models\Hora::create(['hora'=>'13:16']);
        \App\Models\Hora::create(['hora'=>'13:17']);
        \App\Models\Hora::create(['hora'=>'13:18']);
        \App\Models\Hora::create(['hora'=>'13:19']);
        \App\Models\Hora::create(['hora'=>'13:20']);
        \App\Models\Hora::create(['hora'=>'13:21']);
        \App\Models\Hora::create(['hora'=>'13:22']);
        \App\Models\Hora::create(['hora'=>'13:23']);
        \App\Models\Hora::create(['hora'=>'13:24']);
        \App\Models\Hora::create(['hora'=>'13:25']);
        \App\Models\Hora::create(['hora'=>'13:26']);
        \App\Models\Hora::create(['hora'=>'13:27']);
        \App\Models\Hora::create(['hora'=>'13:28']);
        \App\Models\Hora::create(['hora'=>'13:29']);
        \App\Models\Hora::create(['hora'=>'13:30']);
        \App\Models\Hora::create(['hora'=>'13:31']);
        \App\Models\Hora::create(['hora'=>'13:32']);
        \App\Models\Hora::create(['hora'=>'13:33']);
        \App\Models\Hora::create(['hora'=>'13:34']);
        \App\Models\Hora::create(['hora'=>'13:35']);
        \App\Models\Hora::create(['hora'=>'13:36']);
        \App\Models\Hora::create(['hora'=>'13:37']);
        \App\Models\Hora::create(['hora'=>'13:38']);
        \App\Models\Hora::create(['hora'=>'13:39']);
        \App\Models\Hora::create(['hora'=>'13:40']);
        \App\Models\Hora::create(['hora'=>'13:41']);
        \App\Models\Hora::create(['hora'=>'13:42']);
        \App\Models\Hora::create(['hora'=>'13:43']);
        \App\Models\Hora::create(['hora'=>'13:44']);
        \App\Models\Hora::create(['hora'=>'13:45']);
        \App\Models\Hora::create(['hora'=>'13:46']);
        \App\Models\Hora::create(['hora'=>'13:47']);
        \App\Models\Hora::create(['hora'=>'13:48']);
        \App\Models\Hora::create(['hora'=>'13:49']);
        \App\Models\Hora::create(['hora'=>'13:50']);
        \App\Models\Hora::create(['hora'=>'13:51']);
        \App\Models\Hora::create(['hora'=>'13:52']);
        \App\Models\Hora::create(['hora'=>'13:53']);
        \App\Models\Hora::create(['hora'=>'13:54']);
        \App\Models\Hora::create(['hora'=>'13:55']);
        \App\Models\Hora::create(['hora'=>'13:56']);
        \App\Models\Hora::create(['hora'=>'13:57']);
        \App\Models\Hora::create(['hora'=>'13:58']);
        \App\Models\Hora::create(['hora'=>'13:59']);
        \App\Models\Hora::create(['hora'=>'14:00']);
        \App\Models\Hora::create(['hora'=>'14:01']);
        \App\Models\Hora::create(['hora'=>'14:02']);
        \App\Models\Hora::create(['hora'=>'14:03']);
        \App\Models\Hora::create(['hora'=>'14:04']);
        \App\Models\Hora::create(['hora'=>'14:05']);
        \App\Models\Hora::create(['hora'=>'14:06']);
        \App\Models\Hora::create(['hora'=>'14:07']);
        \App\Models\Hora::create(['hora'=>'14:08']);
        \App\Models\Hora::create(['hora'=>'14:09']);
        \App\Models\Hora::create(['hora'=>'14:10']);
        \App\Models\Hora::create(['hora'=>'14:11']);
        \App\Models\Hora::create(['hora'=>'14:12']);
        \App\Models\Hora::create(['hora'=>'14:13']);
        \App\Models\Hora::create(['hora'=>'14:14']);
        \App\Models\Hora::create(['hora'=>'14:15']);
        \App\Models\Hora::create(['hora'=>'14:16']);
        \App\Models\Hora::create(['hora'=>'14:17']);
        \App\Models\Hora::create(['hora'=>'14:18']);
        \App\Models\Hora::create(['hora'=>'14:19']);
        \App\Models\Hora::create(['hora'=>'14:20']);
        \App\Models\Hora::create(['hora'=>'14:21']);
        \App\Models\Hora::create(['hora'=>'14:22']);
        \App\Models\Hora::create(['hora'=>'14:23']);
        \App\Models\Hora::create(['hora'=>'14:24']);
        \App\Models\Hora::create(['hora'=>'14:25']);
        \App\Models\Hora::create(['hora'=>'14:26']);
        \App\Models\Hora::create(['hora'=>'14:27']);
        \App\Models\Hora::create(['hora'=>'14:28']);
        \App\Models\Hora::create(['hora'=>'14:29']);
        \App\Models\Hora::create(['hora'=>'14:30']);
        \App\Models\Hora::create(['hora'=>'14:31']);
        \App\Models\Hora::create(['hora'=>'14:32']);
        \App\Models\Hora::create(['hora'=>'14:33']);
        \App\Models\Hora::create(['hora'=>'14:34']);
        \App\Models\Hora::create(['hora'=>'14:35']);
        \App\Models\Hora::create(['hora'=>'14:36']);
        \App\Models\Hora::create(['hora'=>'14:37']);
        \App\Models\Hora::create(['hora'=>'14:38']);
        \App\Models\Hora::create(['hora'=>'14:39']);
        \App\Models\Hora::create(['hora'=>'14:40']);
        \App\Models\Hora::create(['hora'=>'14:41']);
        \App\Models\Hora::create(['hora'=>'14:42']);
        \App\Models\Hora::create(['hora'=>'14:43']);
        \App\Models\Hora::create(['hora'=>'14:44']);
        \App\Models\Hora::create(['hora'=>'14:45']);
        \App\Models\Hora::create(['hora'=>'14:46']);
        \App\Models\Hora::create(['hora'=>'14:47']);
        \App\Models\Hora::create(['hora'=>'14:48']);
        \App\Models\Hora::create(['hora'=>'14:49']);
        \App\Models\Hora::create(['hora'=>'14:50']);
        \App\Models\Hora::create(['hora'=>'14:51']);
        \App\Models\Hora::create(['hora'=>'14:52']);
        \App\Models\Hora::create(['hora'=>'14:53']);
        \App\Models\Hora::create(['hora'=>'14:54']);
        \App\Models\Hora::create(['hora'=>'14:55']);
        \App\Models\Hora::create(['hora'=>'14:56']);
        \App\Models\Hora::create(['hora'=>'14:57']);
        \App\Models\Hora::create(['hora'=>'14:58']);
        \App\Models\Hora::create(['hora'=>'14:59']);
        \App\Models\Hora::create(['hora'=>'15:00']);
        \App\Models\Hora::create(['hora'=>'15:01']);
        \App\Models\Hora::create(['hora'=>'15:02']);
        \App\Models\Hora::create(['hora'=>'15:03']);
        \App\Models\Hora::create(['hora'=>'15:04']);
        \App\Models\Hora::create(['hora'=>'15:05']);
        \App\Models\Hora::create(['hora'=>'15:06']);
        \App\Models\Hora::create(['hora'=>'15:07']);
        \App\Models\Hora::create(['hora'=>'15:08']);
        \App\Models\Hora::create(['hora'=>'15:09']);
        \App\Models\Hora::create(['hora'=>'15:10']);
        \App\Models\Hora::create(['hora'=>'15:11']);
        \App\Models\Hora::create(['hora'=>'15:12']);
        \App\Models\Hora::create(['hora'=>'15:13']);
        \App\Models\Hora::create(['hora'=>'15:14']);
        \App\Models\Hora::create(['hora'=>'15:15']);
        \App\Models\Hora::create(['hora'=>'15:16']);
        \App\Models\Hora::create(['hora'=>'15:17']);
        \App\Models\Hora::create(['hora'=>'15:18']);
        \App\Models\Hora::create(['hora'=>'15:19']);
        \App\Models\Hora::create(['hora'=>'15:20']);
        \App\Models\Hora::create(['hora'=>'15:21']);
        \App\Models\Hora::create(['hora'=>'15:22']);
        \App\Models\Hora::create(['hora'=>'15:23']);
        \App\Models\Hora::create(['hora'=>'15:24']);
        \App\Models\Hora::create(['hora'=>'15:25']);
        \App\Models\Hora::create(['hora'=>'15:26']);
        \App\Models\Hora::create(['hora'=>'15:27']);
        \App\Models\Hora::create(['hora'=>'15:28']);
        \App\Models\Hora::create(['hora'=>'15:29']);
        \App\Models\Hora::create(['hora'=>'15:30']);
        \App\Models\Hora::create(['hora'=>'15:31']);
        \App\Models\Hora::create(['hora'=>'15:32']);
        \App\Models\Hora::create(['hora'=>'15:33']);
        \App\Models\Hora::create(['hora'=>'15:34']);
        \App\Models\Hora::create(['hora'=>'15:35']);
        \App\Models\Hora::create(['hora'=>'15:36']);
        \App\Models\Hora::create(['hora'=>'15:37']);
        \App\Models\Hora::create(['hora'=>'15:38']);
        \App\Models\Hora::create(['hora'=>'15:39']);
        \App\Models\Hora::create(['hora'=>'15:40']);
        \App\Models\Hora::create(['hora'=>'15:41']);
        \App\Models\Hora::create(['hora'=>'15:42']);
        \App\Models\Hora::create(['hora'=>'15:43']);
        \App\Models\Hora::create(['hora'=>'15:44']);
        \App\Models\Hora::create(['hora'=>'15:45']);
        \App\Models\Hora::create(['hora'=>'15:46']);
        \App\Models\Hora::create(['hora'=>'15:47']);
        \App\Models\Hora::create(['hora'=>'15:48']);
        \App\Models\Hora::create(['hora'=>'15:49']);
        \App\Models\Hora::create(['hora'=>'15:50']);
        \App\Models\Hora::create(['hora'=>'15:51']);
        \App\Models\Hora::create(['hora'=>'15:52']);
        \App\Models\Hora::create(['hora'=>'15:53']);
        \App\Models\Hora::create(['hora'=>'15:54']);
        \App\Models\Hora::create(['hora'=>'15:55']);
        \App\Models\Hora::create(['hora'=>'15:56']);
        \App\Models\Hora::create(['hora'=>'15:57']);
        \App\Models\Hora::create(['hora'=>'15:58']);
        \App\Models\Hora::create(['hora'=>'15:59']);
        \App\Models\Hora::create(['hora'=>'16:00']);
        \App\Models\Hora::create(['hora'=>'16:01']);
        \App\Models\Hora::create(['hora'=>'16:02']);
        \App\Models\Hora::create(['hora'=>'16:03']);
        \App\Models\Hora::create(['hora'=>'16:04']);
        \App\Models\Hora::create(['hora'=>'16:05']);
        \App\Models\Hora::create(['hora'=>'16:06']);
        \App\Models\Hora::create(['hora'=>'16:07']);
        \App\Models\Hora::create(['hora'=>'16:08']);
        \App\Models\Hora::create(['hora'=>'16:09']);
        \App\Models\Hora::create(['hora'=>'16:10']);
        \App\Models\Hora::create(['hora'=>'16:11']);
        \App\Models\Hora::create(['hora'=>'16:12']);
        \App\Models\Hora::create(['hora'=>'16:13']);
        \App\Models\Hora::create(['hora'=>'16:14']);
        \App\Models\Hora::create(['hora'=>'16:15']);
        \App\Models\Hora::create(['hora'=>'16:16']);
        \App\Models\Hora::create(['hora'=>'16:17']);
        \App\Models\Hora::create(['hora'=>'16:18']);
        \App\Models\Hora::create(['hora'=>'16:19']);
        \App\Models\Hora::create(['hora'=>'16:20']);
        \App\Models\Hora::create(['hora'=>'16:21']);
        \App\Models\Hora::create(['hora'=>'16:22']);
        \App\Models\Hora::create(['hora'=>'16:23']);
        \App\Models\Hora::create(['hora'=>'16:24']);
        \App\Models\Hora::create(['hora'=>'16:25']);
        \App\Models\Hora::create(['hora'=>'16:26']);
        \App\Models\Hora::create(['hora'=>'16:27']);
        \App\Models\Hora::create(['hora'=>'16:28']);
        \App\Models\Hora::create(['hora'=>'16:29']);
        \App\Models\Hora::create(['hora'=>'16:30']);
        \App\Models\Hora::create(['hora'=>'16:31']);
        \App\Models\Hora::create(['hora'=>'16:32']);
        \App\Models\Hora::create(['hora'=>'16:33']);
        \App\Models\Hora::create(['hora'=>'16:34']);
        \App\Models\Hora::create(['hora'=>'16:35']);
        \App\Models\Hora::create(['hora'=>'16:36']);
        \App\Models\Hora::create(['hora'=>'16:37']);
        \App\Models\Hora::create(['hora'=>'16:38']);
        \App\Models\Hora::create(['hora'=>'16:39']);
        \App\Models\Hora::create(['hora'=>'16:40']);
        \App\Models\Hora::create(['hora'=>'16:41']);
        \App\Models\Hora::create(['hora'=>'16:42']);
        \App\Models\Hora::create(['hora'=>'16:43']);
        \App\Models\Hora::create(['hora'=>'16:44']);
        \App\Models\Hora::create(['hora'=>'16:45']);
        \App\Models\Hora::create(['hora'=>'16:46']);
        \App\Models\Hora::create(['hora'=>'16:47']);
        \App\Models\Hora::create(['hora'=>'16:48']);
        \App\Models\Hora::create(['hora'=>'16:49']);
        \App\Models\Hora::create(['hora'=>'16:50']);
        \App\Models\Hora::create(['hora'=>'16:51']);
        \App\Models\Hora::create(['hora'=>'16:52']);
        \App\Models\Hora::create(['hora'=>'16:53']);
        \App\Models\Hora::create(['hora'=>'16:54']);
        \App\Models\Hora::create(['hora'=>'16:55']);
        \App\Models\Hora::create(['hora'=>'16:56']);
        \App\Models\Hora::create(['hora'=>'16:57']);
        \App\Models\Hora::create(['hora'=>'16:58']);
        \App\Models\Hora::create(['hora'=>'16:59']);
        \App\Models\Hora::create(['hora'=>'17:00']);
        \App\Models\Hora::create(['hora'=>'17:01']);
        \App\Models\Hora::create(['hora'=>'17:02']);
        \App\Models\Hora::create(['hora'=>'17:03']);
        \App\Models\Hora::create(['hora'=>'17:04']);
        \App\Models\Hora::create(['hora'=>'17:05']);
        \App\Models\Hora::create(['hora'=>'17:06']);
        \App\Models\Hora::create(['hora'=>'17:07']);
        \App\Models\Hora::create(['hora'=>'17:08']);
        \App\Models\Hora::create(['hora'=>'17:09']);
        \App\Models\Hora::create(['hora'=>'17:10']);
        \App\Models\Hora::create(['hora'=>'17:11']);
        \App\Models\Hora::create(['hora'=>'17:12']);
        \App\Models\Hora::create(['hora'=>'17:13']);
        \App\Models\Hora::create(['hora'=>'17:14']);
        \App\Models\Hora::create(['hora'=>'17:15']);
        \App\Models\Hora::create(['hora'=>'17:16']);
        \App\Models\Hora::create(['hora'=>'17:17']);
        \App\Models\Hora::create(['hora'=>'17:18']);
        \App\Models\Hora::create(['hora'=>'17:19']);
        \App\Models\Hora::create(['hora'=>'17:20']);
        \App\Models\Hora::create(['hora'=>'17:21']);
        \App\Models\Hora::create(['hora'=>'17:22']);
        \App\Models\Hora::create(['hora'=>'17:23']);
        \App\Models\Hora::create(['hora'=>'17:24']);
        \App\Models\Hora::create(['hora'=>'17:25']);
        \App\Models\Hora::create(['hora'=>'17:26']);
        \App\Models\Hora::create(['hora'=>'17:27']);
        \App\Models\Hora::create(['hora'=>'17:28']);
        \App\Models\Hora::create(['hora'=>'17:29']);
        \App\Models\Hora::create(['hora'=>'17:30']);
        \App\Models\Hora::create(['hora'=>'17:31']);
        \App\Models\Hora::create(['hora'=>'17:32']);
        \App\Models\Hora::create(['hora'=>'17:33']);
        \App\Models\Hora::create(['hora'=>'17:34']);
        \App\Models\Hora::create(['hora'=>'17:35']);
        \App\Models\Hora::create(['hora'=>'17:36']);
        \App\Models\Hora::create(['hora'=>'17:37']);
        \App\Models\Hora::create(['hora'=>'17:38']);
        \App\Models\Hora::create(['hora'=>'17:39']);
        \App\Models\Hora::create(['hora'=>'17:40']);
        \App\Models\Hora::create(['hora'=>'17:41']);
        \App\Models\Hora::create(['hora'=>'17:42']);
        \App\Models\Hora::create(['hora'=>'17:43']);
        \App\Models\Hora::create(['hora'=>'17:44']);
        \App\Models\Hora::create(['hora'=>'17:45']);
        \App\Models\Hora::create(['hora'=>'17:46']);
        \App\Models\Hora::create(['hora'=>'17:47']);
        \App\Models\Hora::create(['hora'=>'17:48']);
        \App\Models\Hora::create(['hora'=>'17:49']);
        \App\Models\Hora::create(['hora'=>'17:50']);
        \App\Models\Hora::create(['hora'=>'17:51']);
        \App\Models\Hora::create(['hora'=>'17:52']);
        \App\Models\Hora::create(['hora'=>'17:53']);
        \App\Models\Hora::create(['hora'=>'17:54']);
        \App\Models\Hora::create(['hora'=>'17:55']);
        \App\Models\Hora::create(['hora'=>'17:56']);
        \App\Models\Hora::create(['hora'=>'17:57']);
        \App\Models\Hora::create(['hora'=>'17:58']);
        \App\Models\Hora::create(['hora'=>'17:59']);
        \App\Models\Hora::create(['hora'=>'18:00']);
        \App\Models\Hora::create(['hora'=>'18:01']);
        \App\Models\Hora::create(['hora'=>'18:02']);
        \App\Models\Hora::create(['hora'=>'18:03']);
        \App\Models\Hora::create(['hora'=>'18:04']);
        \App\Models\Hora::create(['hora'=>'18:05']);
        \App\Models\Hora::create(['hora'=>'18:06']);
        \App\Models\Hora::create(['hora'=>'18:07']);
        \App\Models\Hora::create(['hora'=>'18:08']);
        \App\Models\Hora::create(['hora'=>'18:09']);
        \App\Models\Hora::create(['hora'=>'18:10']);
        \App\Models\Hora::create(['hora'=>'18:11']);
        \App\Models\Hora::create(['hora'=>'18:12']);
        \App\Models\Hora::create(['hora'=>'18:13']);
        \App\Models\Hora::create(['hora'=>'18:14']);
        \App\Models\Hora::create(['hora'=>'18:15']);
        \App\Models\Hora::create(['hora'=>'18:16']);
        \App\Models\Hora::create(['hora'=>'18:17']);
        \App\Models\Hora::create(['hora'=>'18:18']);
        \App\Models\Hora::create(['hora'=>'18:19']);
        \App\Models\Hora::create(['hora'=>'18:20']);
        \App\Models\Hora::create(['hora'=>'18:21']);
        \App\Models\Hora::create(['hora'=>'18:22']);
        \App\Models\Hora::create(['hora'=>'18:23']);
        \App\Models\Hora::create(['hora'=>'18:24']);
        \App\Models\Hora::create(['hora'=>'18:25']);
        \App\Models\Hora::create(['hora'=>'18:26']);
        \App\Models\Hora::create(['hora'=>'18:27']);
        \App\Models\Hora::create(['hora'=>'18:28']);
        \App\Models\Hora::create(['hora'=>'18:29']);
        \App\Models\Hora::create(['hora'=>'18:30']);
        \App\Models\Hora::create(['hora'=>'18:31']);
        \App\Models\Hora::create(['hora'=>'18:32']);
        \App\Models\Hora::create(['hora'=>'18:33']);
        \App\Models\Hora::create(['hora'=>'18:34']);
        \App\Models\Hora::create(['hora'=>'18:35']);
        \App\Models\Hora::create(['hora'=>'18:36']);
        \App\Models\Hora::create(['hora'=>'18:37']);
        \App\Models\Hora::create(['hora'=>'18:38']);
        \App\Models\Hora::create(['hora'=>'18:39']);
        \App\Models\Hora::create(['hora'=>'18:40']);
        \App\Models\Hora::create(['hora'=>'18:41']);
        \App\Models\Hora::create(['hora'=>'18:42']);
        \App\Models\Hora::create(['hora'=>'18:43']);
        \App\Models\Hora::create(['hora'=>'18:44']);
        \App\Models\Hora::create(['hora'=>'18:45']);
        \App\Models\Hora::create(['hora'=>'18:46']);
        \App\Models\Hora::create(['hora'=>'18:47']);
        \App\Models\Hora::create(['hora'=>'18:48']);
        \App\Models\Hora::create(['hora'=>'18:49']);
        \App\Models\Hora::create(['hora'=>'18:50']);
        \App\Models\Hora::create(['hora'=>'18:51']);
        \App\Models\Hora::create(['hora'=>'18:52']);
        \App\Models\Hora::create(['hora'=>'18:53']);
        \App\Models\Hora::create(['hora'=>'18:54']);
        \App\Models\Hora::create(['hora'=>'18:55']);
        \App\Models\Hora::create(['hora'=>'18:56']);
        \App\Models\Hora::create(['hora'=>'18:57']);
        \App\Models\Hora::create(['hora'=>'18:58']);
        \App\Models\Hora::create(['hora'=>'18:59']);
        \App\Models\Hora::create(['hora'=>'19:00']);
        \App\Models\Hora::create(['hora'=>'19:01']);
        \App\Models\Hora::create(['hora'=>'19:02']);
        \App\Models\Hora::create(['hora'=>'19:03']);
        \App\Models\Hora::create(['hora'=>'19:04']);
        \App\Models\Hora::create(['hora'=>'19:05']);
        \App\Models\Hora::create(['hora'=>'19:06']);
        \App\Models\Hora::create(['hora'=>'19:07']);
        \App\Models\Hora::create(['hora'=>'19:08']);
        \App\Models\Hora::create(['hora'=>'19:09']);
        \App\Models\Hora::create(['hora'=>'19:10']);
        \App\Models\Hora::create(['hora'=>'19:11']);
        \App\Models\Hora::create(['hora'=>'19:12']);
        \App\Models\Hora::create(['hora'=>'19:13']);
        \App\Models\Hora::create(['hora'=>'19:14']);
        \App\Models\Hora::create(['hora'=>'19:15']);
        \App\Models\Hora::create(['hora'=>'19:16']);
        \App\Models\Hora::create(['hora'=>'19:17']);
        \App\Models\Hora::create(['hora'=>'19:18']);
        \App\Models\Hora::create(['hora'=>'19:19']);
        \App\Models\Hora::create(['hora'=>'19:20']);
        \App\Models\Hora::create(['hora'=>'19:21']);
        \App\Models\Hora::create(['hora'=>'19:22']);
        \App\Models\Hora::create(['hora'=>'19:23']);
        \App\Models\Hora::create(['hora'=>'19:24']);
        \App\Models\Hora::create(['hora'=>'19:25']);
        \App\Models\Hora::create(['hora'=>'19:26']);
        \App\Models\Hora::create(['hora'=>'19:27']);
        \App\Models\Hora::create(['hora'=>'19:28']);
        \App\Models\Hora::create(['hora'=>'19:29']);
        \App\Models\Hora::create(['hora'=>'19:30']);
        \App\Models\Hora::create(['hora'=>'19:31']);
        \App\Models\Hora::create(['hora'=>'19:32']);
        \App\Models\Hora::create(['hora'=>'19:33']);
        \App\Models\Hora::create(['hora'=>'19:34']);
        \App\Models\Hora::create(['hora'=>'19:35']);
        \App\Models\Hora::create(['hora'=>'19:36']);
        \App\Models\Hora::create(['hora'=>'19:37']);
        \App\Models\Hora::create(['hora'=>'19:38']);
        \App\Models\Hora::create(['hora'=>'19:39']);
        \App\Models\Hora::create(['hora'=>'19:40']);
        \App\Models\Hora::create(['hora'=>'19:41']);
        \App\Models\Hora::create(['hora'=>'19:42']);
        \App\Models\Hora::create(['hora'=>'19:43']);
        \App\Models\Hora::create(['hora'=>'19:44']);
        \App\Models\Hora::create(['hora'=>'19:45']);
        \App\Models\Hora::create(['hora'=>'19:46']);
        \App\Models\Hora::create(['hora'=>'19:47']);
        \App\Models\Hora::create(['hora'=>'19:48']);
        \App\Models\Hora::create(['hora'=>'19:49']);
        \App\Models\Hora::create(['hora'=>'19:50']);
        \App\Models\Hora::create(['hora'=>'19:51']);
        \App\Models\Hora::create(['hora'=>'19:52']);
        \App\Models\Hora::create(['hora'=>'19:53']);
        \App\Models\Hora::create(['hora'=>'19:54']);
        \App\Models\Hora::create(['hora'=>'19:55']);
        \App\Models\Hora::create(['hora'=>'19:56']);
        \App\Models\Hora::create(['hora'=>'19:57']);
        \App\Models\Hora::create(['hora'=>'19:58']);
        \App\Models\Hora::create(['hora'=>'19:59']);
        \App\Models\Hora::create(['hora'=>'20:00']);
        \App\Models\Hora::create(['hora'=>'20:01']);
        \App\Models\Hora::create(['hora'=>'20:02']);
        \App\Models\Hora::create(['hora'=>'20:03']);
        \App\Models\Hora::create(['hora'=>'20:04']);
        \App\Models\Hora::create(['hora'=>'20:05']);
        \App\Models\Hora::create(['hora'=>'20:06']);
        \App\Models\Hora::create(['hora'=>'20:07']);
        \App\Models\Hora::create(['hora'=>'20:08']);
        \App\Models\Hora::create(['hora'=>'20:09']);
        \App\Models\Hora::create(['hora'=>'20:10']);
        \App\Models\Hora::create(['hora'=>'20:11']);
        \App\Models\Hora::create(['hora'=>'20:12']);
        \App\Models\Hora::create(['hora'=>'20:13']);
        \App\Models\Hora::create(['hora'=>'20:14']);
        \App\Models\Hora::create(['hora'=>'20:15']);
        \App\Models\Hora::create(['hora'=>'20:16']);
        \App\Models\Hora::create(['hora'=>'20:17']);
        \App\Models\Hora::create(['hora'=>'20:18']);
        \App\Models\Hora::create(['hora'=>'20:19']);
        \App\Models\Hora::create(['hora'=>'20:20']);
        \App\Models\Hora::create(['hora'=>'20:21']);
        \App\Models\Hora::create(['hora'=>'20:22']);
        \App\Models\Hora::create(['hora'=>'20:23']);
        \App\Models\Hora::create(['hora'=>'20:24']);
        \App\Models\Hora::create(['hora'=>'20:25']);
        \App\Models\Hora::create(['hora'=>'20:26']);
        \App\Models\Hora::create(['hora'=>'20:27']);
        \App\Models\Hora::create(['hora'=>'20:28']);
        \App\Models\Hora::create(['hora'=>'20:29']);
        \App\Models\Hora::create(['hora'=>'20:30']);
        \App\Models\Hora::create(['hora'=>'20:31']);
        \App\Models\Hora::create(['hora'=>'20:32']);
        \App\Models\Hora::create(['hora'=>'20:33']);
        \App\Models\Hora::create(['hora'=>'20:34']);
        \App\Models\Hora::create(['hora'=>'20:35']);
        \App\Models\Hora::create(['hora'=>'20:36']);
        \App\Models\Hora::create(['hora'=>'20:37']);
        \App\Models\Hora::create(['hora'=>'20:38']);
        \App\Models\Hora::create(['hora'=>'20:39']);
        \App\Models\Hora::create(['hora'=>'20:40']);
        \App\Models\Hora::create(['hora'=>'20:41']);
        \App\Models\Hora::create(['hora'=>'20:42']);
        \App\Models\Hora::create(['hora'=>'20:43']);
        \App\Models\Hora::create(['hora'=>'20:44']);
        \App\Models\Hora::create(['hora'=>'20:45']);
        \App\Models\Hora::create(['hora'=>'20:46']);
        \App\Models\Hora::create(['hora'=>'20:47']);
        \App\Models\Hora::create(['hora'=>'20:48']);
        \App\Models\Hora::create(['hora'=>'20:49']);
        \App\Models\Hora::create(['hora'=>'20:50']);
        \App\Models\Hora::create(['hora'=>'20:51']);
        \App\Models\Hora::create(['hora'=>'20:52']);
        \App\Models\Hora::create(['hora'=>'20:53']);
        \App\Models\Hora::create(['hora'=>'20:54']);
        \App\Models\Hora::create(['hora'=>'20:55']);
        \App\Models\Hora::create(['hora'=>'20:56']);
        \App\Models\Hora::create(['hora'=>'20:57']);
        \App\Models\Hora::create(['hora'=>'20:58']);
        \App\Models\Hora::create(['hora'=>'20:59']);
        \App\Models\Hora::create(['hora'=>'21:00']);
        \App\Models\Hora::create(['hora'=>'21:01']);
        \App\Models\Hora::create(['hora'=>'21:02']);
        \App\Models\Hora::create(['hora'=>'21:03']);
        \App\Models\Hora::create(['hora'=>'21:04']);
        \App\Models\Hora::create(['hora'=>'21:05']);
        \App\Models\Hora::create(['hora'=>'21:06']);
        \App\Models\Hora::create(['hora'=>'21:07']);
        \App\Models\Hora::create(['hora'=>'21:08']);
        \App\Models\Hora::create(['hora'=>'21:09']);
        \App\Models\Hora::create(['hora'=>'21:10']);
        \App\Models\Hora::create(['hora'=>'21:11']);
        \App\Models\Hora::create(['hora'=>'21:12']);
        \App\Models\Hora::create(['hora'=>'21:13']);
        \App\Models\Hora::create(['hora'=>'21:14']);
        \App\Models\Hora::create(['hora'=>'21:15']);
        \App\Models\Hora::create(['hora'=>'21:16']);
        \App\Models\Hora::create(['hora'=>'21:17']);
        \App\Models\Hora::create(['hora'=>'21:18']);
        \App\Models\Hora::create(['hora'=>'21:19']);
        \App\Models\Hora::create(['hora'=>'21:20']);
        \App\Models\Hora::create(['hora'=>'21:21']);
        \App\Models\Hora::create(['hora'=>'21:22']);
        \App\Models\Hora::create(['hora'=>'21:23']);
        \App\Models\Hora::create(['hora'=>'21:24']);
        \App\Models\Hora::create(['hora'=>'21:25']);
        \App\Models\Hora::create(['hora'=>'21:26']);
        \App\Models\Hora::create(['hora'=>'21:27']);
        \App\Models\Hora::create(['hora'=>'21:28']);
        \App\Models\Hora::create(['hora'=>'21:29']);
        \App\Models\Hora::create(['hora'=>'21:30']);
        \App\Models\Hora::create(['hora'=>'21:31']);
        \App\Models\Hora::create(['hora'=>'21:32']);
        \App\Models\Hora::create(['hora'=>'21:33']);
        \App\Models\Hora::create(['hora'=>'21:34']);
        \App\Models\Hora::create(['hora'=>'21:35']);
        \App\Models\Hora::create(['hora'=>'21:36']);
        \App\Models\Hora::create(['hora'=>'21:37']);
        \App\Models\Hora::create(['hora'=>'21:38']);
        \App\Models\Hora::create(['hora'=>'21:39']);
        \App\Models\Hora::create(['hora'=>'21:40']);
        \App\Models\Hora::create(['hora'=>'21:41']);
        \App\Models\Hora::create(['hora'=>'21:42']);
        \App\Models\Hora::create(['hora'=>'21:43']);
        \App\Models\Hora::create(['hora'=>'21:44']);
        \App\Models\Hora::create(['hora'=>'21:45']);
        \App\Models\Hora::create(['hora'=>'21:46']);
        \App\Models\Hora::create(['hora'=>'21:47']);
        \App\Models\Hora::create(['hora'=>'21:48']);
        \App\Models\Hora::create(['hora'=>'21:49']);
        \App\Models\Hora::create(['hora'=>'21:50']);
        \App\Models\Hora::create(['hora'=>'21:51']);
        \App\Models\Hora::create(['hora'=>'21:52']);
        \App\Models\Hora::create(['hora'=>'21:53']);
        \App\Models\Hora::create(['hora'=>'21:54']);
        \App\Models\Hora::create(['hora'=>'21:55']);
        \App\Models\Hora::create(['hora'=>'21:56']);
        \App\Models\Hora::create(['hora'=>'21:57']);
        \App\Models\Hora::create(['hora'=>'21:58']);
        \App\Models\Hora::create(['hora'=>'21:59']);
        \App\Models\Hora::create(['hora'=>'22:00']);
        \App\Models\Hora::create(['hora'=>'22:01']);
        \App\Models\Hora::create(['hora'=>'22:02']);
        \App\Models\Hora::create(['hora'=>'22:03']);
        \App\Models\Hora::create(['hora'=>'22:04']);
        \App\Models\Hora::create(['hora'=>'22:05']);
        \App\Models\Hora::create(['hora'=>'22:06']);
        \App\Models\Hora::create(['hora'=>'22:07']);
        \App\Models\Hora::create(['hora'=>'22:08']);
        \App\Models\Hora::create(['hora'=>'22:09']);
        \App\Models\Hora::create(['hora'=>'22:10']);
        \App\Models\Hora::create(['hora'=>'22:11']);
        \App\Models\Hora::create(['hora'=>'22:12']);
        \App\Models\Hora::create(['hora'=>'22:13']);
        \App\Models\Hora::create(['hora'=>'22:14']);
        \App\Models\Hora::create(['hora'=>'22:15']);
        \App\Models\Hora::create(['hora'=>'22:16']);
        \App\Models\Hora::create(['hora'=>'22:17']);
        \App\Models\Hora::create(['hora'=>'22:18']);
        \App\Models\Hora::create(['hora'=>'22:19']);
        \App\Models\Hora::create(['hora'=>'22:20']);
        \App\Models\Hora::create(['hora'=>'22:21']);
        \App\Models\Hora::create(['hora'=>'22:22']);
        \App\Models\Hora::create(['hora'=>'22:23']);
        \App\Models\Hora::create(['hora'=>'22:24']);
        \App\Models\Hora::create(['hora'=>'22:25']);
        \App\Models\Hora::create(['hora'=>'22:26']);
        \App\Models\Hora::create(['hora'=>'22:27']);
        \App\Models\Hora::create(['hora'=>'22:28']);
        \App\Models\Hora::create(['hora'=>'22:29']);
        \App\Models\Hora::create(['hora'=>'22:30']);
        \App\Models\Hora::create(['hora'=>'22:31']);
        \App\Models\Hora::create(['hora'=>'22:32']);
        \App\Models\Hora::create(['hora'=>'22:33']);
        \App\Models\Hora::create(['hora'=>'22:34']);
        \App\Models\Hora::create(['hora'=>'22:35']);
        \App\Models\Hora::create(['hora'=>'22:36']);
        \App\Models\Hora::create(['hora'=>'22:37']);
        \App\Models\Hora::create(['hora'=>'22:38']);
        \App\Models\Hora::create(['hora'=>'22:39']);
        \App\Models\Hora::create(['hora'=>'22:40']);
        \App\Models\Hora::create(['hora'=>'22:41']);
        \App\Models\Hora::create(['hora'=>'22:42']);
        \App\Models\Hora::create(['hora'=>'22:43']);
        \App\Models\Hora::create(['hora'=>'22:44']);
        \App\Models\Hora::create(['hora'=>'22:45']);
        \App\Models\Hora::create(['hora'=>'22:46']);
        \App\Models\Hora::create(['hora'=>'22:47']);
        \App\Models\Hora::create(['hora'=>'22:48']);
        \App\Models\Hora::create(['hora'=>'22:49']);
        \App\Models\Hora::create(['hora'=>'22:50']);
        \App\Models\Hora::create(['hora'=>'22:51']);
        \App\Models\Hora::create(['hora'=>'22:52']);
        \App\Models\Hora::create(['hora'=>'22:53']);
        \App\Models\Hora::create(['hora'=>'22:54']);
        \App\Models\Hora::create(['hora'=>'22:55']);
        \App\Models\Hora::create(['hora'=>'22:56']);
        \App\Models\Hora::create(['hora'=>'22:57']);
        \App\Models\Hora::create(['hora'=>'22:58']);
        \App\Models\Hora::create(['hora'=>'22:59']);
        \App\Models\Hora::create(['hora'=>'23:00']);
        \App\Models\Hora::create(['hora'=>'23:01']);
        \App\Models\Hora::create(['hora'=>'23:02']);
        \App\Models\Hora::create(['hora'=>'23:03']);
        \App\Models\Hora::create(['hora'=>'23:04']);
        \App\Models\Hora::create(['hora'=>'23:05']);
        \App\Models\Hora::create(['hora'=>'23:06']);
        \App\Models\Hora::create(['hora'=>'23:07']);
        \App\Models\Hora::create(['hora'=>'23:08']);
        \App\Models\Hora::create(['hora'=>'23:09']);
        \App\Models\Hora::create(['hora'=>'23:10']);
        \App\Models\Hora::create(['hora'=>'23:11']);
        \App\Models\Hora::create(['hora'=>'23:12']);
        \App\Models\Hora::create(['hora'=>'23:13']);
        \App\Models\Hora::create(['hora'=>'23:14']);
        \App\Models\Hora::create(['hora'=>'23:15']);
        \App\Models\Hora::create(['hora'=>'23:16']);
        \App\Models\Hora::create(['hora'=>'23:17']);
        \App\Models\Hora::create(['hora'=>'23:18']);
        \App\Models\Hora::create(['hora'=>'23:19']);
        \App\Models\Hora::create(['hora'=>'23:20']);
        \App\Models\Hora::create(['hora'=>'23:21']);
        \App\Models\Hora::create(['hora'=>'23:22']);
        \App\Models\Hora::create(['hora'=>'23:23']);
        \App\Models\Hora::create(['hora'=>'23:24']);
        \App\Models\Hora::create(['hora'=>'23:25']);
        \App\Models\Hora::create(['hora'=>'23:26']);
        \App\Models\Hora::create(['hora'=>'23:27']);
        \App\Models\Hora::create(['hora'=>'23:28']);
        \App\Models\Hora::create(['hora'=>'23:29']);
        \App\Models\Hora::create(['hora'=>'23:30']);
        \App\Models\Hora::create(['hora'=>'23:31']);
        \App\Models\Hora::create(['hora'=>'23:32']);
        \App\Models\Hora::create(['hora'=>'23:33']);
        \App\Models\Hora::create(['hora'=>'23:34']);
        \App\Models\Hora::create(['hora'=>'23:35']);
        \App\Models\Hora::create(['hora'=>'23:36']);
        \App\Models\Hora::create(['hora'=>'23:37']);
        \App\Models\Hora::create(['hora'=>'23:38']);
        \App\Models\Hora::create(['hora'=>'23:39']);
        \App\Models\Hora::create(['hora'=>'23:40']);
        \App\Models\Hora::create(['hora'=>'23:41']);
        \App\Models\Hora::create(['hora'=>'23:42']);
        \App\Models\Hora::create(['hora'=>'23:43']);
        \App\Models\Hora::create(['hora'=>'23:44']);
        \App\Models\Hora::create(['hora'=>'23:45']);
        \App\Models\Hora::create(['hora'=>'23:46']);
        \App\Models\Hora::create(['hora'=>'23:47']);
        \App\Models\Hora::create(['hora'=>'23:48']);
        \App\Models\Hora::create(['hora'=>'23:49']);
        \App\Models\Hora::create(['hora'=>'23:50']);
        \App\Models\Hora::create(['hora'=>'23:51']);
        \App\Models\Hora::create(['hora'=>'23:52']);
        \App\Models\Hora::create(['hora'=>'23:53']);
        \App\Models\Hora::create(['hora'=>'23:54']);
        \App\Models\Hora::create(['hora'=>'23:55']);
        \App\Models\Hora::create(['hora'=>'23:56']);
        \App\Models\Hora::create(['hora'=>'23:57']);
        \App\Models\Hora::create(['hora'=>'23:58']);
        \App\Models\Hora::create(['hora'=>'23:59']);

        \App\Models\Moneda::create(['moneda'=>'Bolivares', 'abreviacion'=>'Bs.']);
        \App\Models\Moneda::create(['moneda'=>'Dolares', 'abreviacion'=>'USD']);

        \App\Models\Pago::create(['banco'=>'Banco de Venezuela', 'codigo'=>'0102', 'cedula'=>'13133780', 'telefono'=>'04241906854']);

        \App\Models\User::create(['name'=>'Alejandro',
        'username'=>'alejandro',
        'password'=>'$2y$10$P7g2rGQ9aXM6qgJAgOmecuV5LwBNUC4d2bqtRU5RRbPIpi61mdTEW',
        'nivel_id'=>3,
        'estatus_id'=>1,
        'propietario_id'=>1,
        'moneda_id'=>1,
        'trato_id'=>1,
        'cod_pais'=>'+58',
        ]);

        \App\Models\User::create(['name'=>'Nestor',
        'username'=>'nestor',
        'password'=>'$2y$10$P7g2rGQ9aXM6qgJAgOmecuV5LwBNUC4d2bqtRU5RRbPIpi61mdTEW',
        'nivel_id'=>2,
        'estatus_id'=>1,
        'propietario_id'=>1,
        'moneda_id'=>1,
        'trato_id'=>1,
        'cod_pais'=>'+58',
        ]);

        \App\Models\User::create(['name'=>'Usuario',
        'username'=>'usuario',
        'password'=>'$2y$10$P7g2rGQ9aXM6qgJAgOmecuV5LwBNUC4d2bqtRU5RRbPIpi61mdTEW',
        'nivel_id'=>1,
        'estatus_id'=>1,
        'propietario_id'=>2,
        'moneda_id'=>1,
        'trato_id'=>1,
        'cod_pais'=>'+58',
        ]);

        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>1,
        'carrera'=>1,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>1,
        'carrera'=>2,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>1,
        'carrera'=>3,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>1,
        'carrera'=>4,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>1,
        'carrera'=>5,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>1,
        'carrera'=>6,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>1,
        'carrera'=>7,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>1,
        'carrera'=>8,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>1,
        'carrera'=>9,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>1,
        'carrera'=>10,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>7,
        'carrera'=>1,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>7,
        'carrera'=>2,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>7,
        'carrera'=>3,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>7,
        'carrera'=>4,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>7,
        'carrera'=>5,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>7,
        'carrera'=>6,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>7,
        'carrera'=>7,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>7,
        'carrera'=>8,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>7,
        'carrera'=>9,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>7,
        'carrera'=>10,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'carrera'=>1,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'carrera'=>2,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'carrera'=>3,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'carrera'=>4,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'carrera'=>5,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'carrera'=>6,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'carrera'=>7,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'carrera'=>8,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'carrera'=>9,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);
        \App\Models\Pronostico::create(['fecha_carrera'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'carrera'=>10,
        'primera_marca'=>'5 Gran Sol',
        'segunda_marca'=>'3 Solinero',
        'tercera_marca'=>'1 Gran Papa',
        'cuarta_marca'=>'10 Don Luis',
        ]);

        \App\Models\Gaceta::create(['fecha'=> date('d/m/Y'),
        'fecha_invertida'=>'20250819',
        'hipodromo_id'=>1,
        'ruta'=>10,
        ]);
        \App\Models\Gaceta::create(['fecha'=>date('d/m/Y'),
        'fecha_invertida'=>'20250819',
        'hipodromo_id'=>7,
        'ruta'=>10,
        ]);
        \App\Models\Gaceta::create(['fecha'=>date('d/m/Y'),
        'fecha_invertida'=>'20250819',
        'hipodromo_id'=>10,
        'ruta'=>10,
        ]);

        \App\Models\Gaceta::create(['fecha'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'hipodromo_id'=>10,
        'ruta'=>10,
        ]);

        \App\Models\UserMovimiento::create(['usuario_id'=>3,
        'fecha'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'referencia'=>1234567890,
        'operacion_id'=>1,
        'monto'=>750,
        'descripcion'=>'Recarga de Saldo',
        ]);

        \App\Models\UserMovimiento::create(['usuario_id'=>3,
        'fecha'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'referencia'=>1234567890,
        'operacion_id'=>2,
        'monto'=>750,
        'descripcion'=>'pago mensualidad',
        ]);

        \App\Models\UserMovimiento::create(['usuario_id'=>3,
        'fecha'=>date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'referencia'=>1234567890,
        'operacion_id'=>1,
        'monto'=>1000,
        'descripcion'=>'Recarga de Saldo',
        ]);

        \App\Models\Transmisione::create(['fecha'=> date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'canal'=> 'Venevision',
        'ruta'=> 'https://www.youtube.com/embed/ihZ-mqpFzhc?si=QTAxgCyvZYwAXiBP',
        ]);
        \App\Models\Transmisione::create(['fecha'=> date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'canal'=> 'Televen',
        'ruta'=> 'https://www.youtube.com/embed/RmOniqBHH4U?si=y_piTuB2grYixVji',
        ]);
        \App\Models\Transmisione::create(['fecha'=> date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'canal'=> 'Meridiano',
        'ruta'=> 'https://www.youtube.com/embed/UY3bvU4Ptec?si=12zVsrODOgxiWn5c',
        ]);
        \App\Models\Transmisione::create(['fecha'=> date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'canal'=> 'SimpleTV',
        'ruta'=> 'https://www.youtube.com/embed/7k89I6i1kNA?si=bMw7AKyCl22HlDLL',
        ]);
        \App\Models\Transmisione::create(['fecha'=> date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'canal'=> 'RCTV',
        'ruta'=> 'https://www.youtube.com/embed/iN_5sKv_l74?si=QelLQ0cd13DPxaEZ',
        ]);
        \App\Models\Transmisione::create(['fecha'=> date('d/m/Y'),
        'fecha_invertida'=>date('Ymd'),
        'canal'=> 'HBO',
        'ruta'=> 'https://www.youtube.com/embed/9F_BRjGi3L8?si=egm7fb_GxftUzo_k',
        ]);

        \App\Models\Tope::create([
        'taquilla_id'=>1,
        'moneda_id'=>1,
        'apuesta_minima'=>20,
        'apuesta_maxima'=>100,
        'maximo_dividendo'=>200,
        'cupo_caballo'=>500,
        ]);

        \App\Models\Tope::create([
        'taquilla_id'=>1,
        'moneda_id'=>2,
        'apuesta_minima'=>2,
        'apuesta_maxima'=>7,
        'maximo_dividendo'=>50,
        'cupo_caballo'=>50,
        ]);

        \App\Models\Precio::create([
        'moneda_id'=>1,
        'ganador'=>20,
        'place'=>20,
        'show'=>20,
        'exacta'=>20,
        'trifecta'=>10,
        'superfecta'=>10,
        ]);

        \App\Models\Precio::create([
        'moneda_id'=>2,
        'ganador'=>2,
        'place'=>2,
        'show'=>2,
        'exacta'=>2,
        'trifecta'=>1,
        'superfecta'=>1,
        ]);

        \App\Models\RegaliasNacionale::create([
        'taquilla_id'=>1,
        'i_caso1'=>20,
        'f_caso1'=>36.1,
        'modo1'=>'IGUAL',
        'regalia1'=>34,
        'i_caso2'=>36.11,
        'f_caso2'=>42.1,
        'modo2'=>'IGUAL',
        'regalia2'=>40,
        'i_caso3'=>42.11,
        'f_caso3'=>200,
        'modo3'=>'MAS',
        'regalia3'=>18,
        'i_caso4'=>0,
        'f_caso4'=>0,
        'modo4'=>'MAS',
        'regalia4'=>0,
        'i_caso5'=>0,
        'f_caso5'=>0,
        'modo5'=>'MAS',
        'regalia5'=>0
        ]);

        \App\Models\RegaliasInternacionale::create([
        'taquilla_id'=>1,
        'i_caso1'=>2,
        'f_caso1'=>50,
        'modo1'=>'MAS',
        'regalia1'=>0.6,
        'i_caso2'=>0,
        'f_caso2'=>0,
        'modo2'=>'MAS',
        'regalia2'=>0,
        'i_caso3'=>0,
        'f_caso3'=>0,
        'modo3'=>'MAS',
        'regalia3'=>0,
        'i_caso4'=>0,
        'f_caso4'=>0,
        'modo4'=>'MAS',
        'regalia4'=>0,
        'i_caso5'=>0,
        'f_caso5'=>0,
        'modo5'=>'MAS',
        'regalia5'=>0
        ]);

        \App\Models\Carrera::create([
        'numero_carrera'=>1,
        'hipodromo_id'=>7,
        'apuesta_id'=>2,
        'fecha_carrera'=>date('d/m/Y'),
        'hora_cierre'=>'12:00',
        'estatus_id'=>1
        ]);
        \App\Models\Carrera::create([
        'numero_carrera'=>1,
        'hipodromo_id'=>3,
        'apuesta_id'=>8,
        'fecha_carrera'=>date('d/m/Y'),
        'hora_cierre'=>'12:00',
        'estatus_id'=>1
        ]);

        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>1,
        'carrera'=>1,
        'numero_ejemplar'=>1,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>1,
        'carrera'=>1,
        'numero_ejemplar'=>2,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>1,
        'carrera'=>1,
        'numero_ejemplar'=>3,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>1,
        'carrera'=>1,
        'numero_ejemplar'=>4,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>1,
        'carrera'=>1,
        'numero_ejemplar'=>5,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>1,
        'carrera'=>1,
        'numero_ejemplar'=>6,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>1,
        'carrera'=>1,
        'numero_ejemplar'=>7,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>1,
        'carrera'=>1,
        'numero_ejemplar'=>8,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>1,
        'carrera'=>1,
        'numero_ejemplar'=>9,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>1,
        'carrera'=>1,
        'numero_ejemplar'=>10,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
                                                            
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>1,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>2,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>3,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>4,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>5,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>6,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>7,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>8,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>9,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>10,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>11,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>12,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>13,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>14,
        'fecha_carrera'=>date('d/m/Y'),
        ]);
        \App\Models\CarrerasDetalle::create([
        'carrera_id'=>2,
        'carrera'=>1,
        'numero_ejemplar'=>15,
        'fecha_carrera'=>date('d/m/Y'),
        ]);

        \App\Models\RematesParametro::create([
        'moneda_id'=>2,
        'caso1_i'=>0,
        'caso1_f'=>1,
        'caso1_m'=>0.5,
        'caso2_i'=>1.1,
        'caso2_f'=>2,
        'caso2_m'=>0.7,
        'caso3_i'=>2.1,
        'caso3_f'=>5,
        'caso3_m'=>1,
        'caso4_i'=>5.1,
        'caso4_f'=>99999,
        'caso4_m'=>1.2,
        ]);

    }
}
