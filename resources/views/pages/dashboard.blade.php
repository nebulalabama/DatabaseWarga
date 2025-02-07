@extends('layouts.app')

@section('title', 'Dashboard - Dbwarga')

@section('content')
<div class="mb-6">
	<h1 class="text-3xl font-semibold text-primary dark:text-secondary/90">Welcome Back, {{ $user->name }} !</h1>
</div>
<main class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
	<div class="w-full max-w-md p-4 bg-white rounded-lg shadow h-fit dark:bg-boxdark/70 dark:bg-gray-800 md:p-6">
		<div class="flex justify-between">
			<div>
				<h5 class="pb-2 text-3xl font-bold leading-none text-gray-900 dark:text-white">{{ $user_count }}</h5>
				<p class="text-base font-normal text-gray-500 dark:text-gray-400">Jumlah pengguna saat ini</p>
			</div>
		</div>
		<div id="area-chart"></div>
		<div class="grid items-center justify-between grid-cols-1 border-t border-gray-200 dark:border-gray-700">
			<div class="flex items-center justify-between pt-5">
				<a href="{{ route('users.index') }}"
					class="inline-flex items-center px-3 py-2 text-sm font-semibold text-blue-600 uppercase rounded-lg hover:text-blue-700 dark:hover:text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
					Data Pengguna
					<svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
						fill="none" viewBox="0 0 6 10">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="m1 9 4-4-4-4" />
					</svg>
				</a>
			</div>
		</div>
	</div>
	
	<div class="w-full max-w-md p-4 bg-white rounded-lg shadow h-fit dark:bg-boxdark/70 dark:bg-gray-800 md:p-6">
		<div class="flex justify-between mb-3">
			<h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Database</h5>
		</div>

		<div id="filters" class="flex flex-wrap items-center justify-start w-full gap-2">
			<label><input type="checkbox" value="Penduduk" checked> Penduduk</label>
			<label><input type="checkbox" value="Kartu Keluarga" checked> Kartu Keluarga</label>
			<label><input type="checkbox" value="Kelurahan" checked> Kelurahan</label>
			<label><input type="checkbox" value="RT" checked> RT</label>
			<label><input type="checkbox" value="RW" checked> RW</label>
		</div>


		<div class="py-6" id="donut-chart"></div>
	</div>
	
	<div
		class="flex-row w-full max-w-md py-4 font-semibold bg-white rounded-lg shadow h-fit dark:bg-boxdark/70 dark:bg-gray-800">

		{{-- User --}}
		<div
			class="flex items-center m-6 my-3 overflow-hidden bg-white border rounded-md shadow dark:bg-slate-800/80 border-secondary dark:border-secondary/20">
			<div class="p-3 bg-slate-200 dark:bg-secondary/5 ">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					class="w-12 h-12 bi bi-person-fill fill-secondary" viewBox="0 0 16 16">
					<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
				</svg>
			</div>
			<div class="px-4 text-gray-700">
				<h3 class="text-sm tracking-wider">Total Pengguna</h3>
				<p class="text-xl">{{ $user_count }}</p>
			</div>
		</div>

		{{-- Penduduk --}}
		<div
			class="flex items-center m-6 my-3 overflow-hidden bg-white border rounded-md shadow dark:bg-slate-800/80 dark:border-secondary/20 border-secondary">
			<div class="p-3 bg-slate-200 dark:bg-secondary/5">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					class="w-12 h-12 bi bi-people-fill fill-secondary" viewBox="0 0 16 16">
					<path
						d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
				</svg>
			</div>
			<div class="px-4 text-gray-700">
				<h3 class="text-sm tracking-wider">Total Penduduk</h3>
				<p class="text-xl">{{ $resident }}</p>
			</div>
		</div>


		{{-- KK --}}
		<div
			class="flex items-center m-6 my-3 overflow-hidden bg-white border rounded-md shadow dark:bg-slate-800/80 dark:border-secondary/20 border-secondary">
			<div class="p-3 bg-slate-200 dark:bg-secondary/5">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					class="w-12 h-12 bi bi-person-vcard-fill fill-secondary" viewBox="0 0 16 16">
					<path
						d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
				</svg>
			</div>
			<div class="px-4 text-gray-700">
				<h3 class="text-sm tracking-wider">Total Kartu Keluarga</h3>
				<p class="text-xl">{{ $family_card }}</p>
			</div>
		</div>


		{{-- RT --}}
		<div
			class="flex items-center m-6 my-3 overflow-hidden bg-white border rounded-md shadow dark:bg-slate-800/80 dark:border-secondary/20 border-secondary">
			<div class="p-3 bg-slate-200 dark:bg-secondary/5">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					class="w-12 h-12 bi bi-person-rolodex fill-secondary" viewBox="0 0 16 16">
					<path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
					<path
						d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z" />
				</svg>
			</div>
			<div class="px-4 text-gray-700">
				<h3 class="text-sm tracking-wider">Total RT</h3>
				<p class="text-xl">{{ $neighborhoods }}</p>
			</div>
		</div>

		{{-- RW --}}
		<div
			class="flex items-center m-6 my-3 overflow-hidden bg-white border rounded-md shadow dark:bg-slate-800/80 dark:border-secondary/20 border-secondary">
			<div class="p-3 bg-slate-200 dark:bg-secondary/5">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					class="w-12 h-12 bi bi-person-square fill-secondary" viewBox="0 0 16 16">
					<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
					<path
						d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
				</svg>
			</div>
			<div class="px-4 text-gray-700">
				<h3 class="text-sm tracking-wider">Total RW</h3>
				<p class="text-xl">{{ $generals }}</p>
			</div>
		</div>

		{{-- Kelurahan --}}
		<div
			class="flex items-center m-6 my-3 overflow-hidden bg-white border rounded-md shadow dark:bg-slate-800/80 dark:border-secondary/20 border-secondary">
			<div class="p-3 bg-slate-200 dark:bg-secondary/5">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
					class="w-12 h-12 bi bi-person-lines-fill fill-secondary" viewBox="0 0 16 16">
					<path
						d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
				</svg>
			</div>
			<div class="px-4 text-gray-700">
				<h3 class="text-sm tracking-wider">Total Kelurahan</h3>
				<p class="text-xl">{{ $community_units }}</p>
			</div>
		</div>

	</div>

</main>

@php
	use Carbon\Carbon;

	
	$users = App\Models\User::selectRaw('YEAR(created_at) as year, COUNT(*) as count')
		->groupBy('year')
		->orderBy('year')
		->get();

	$currentYear = Carbon::now()->year;
	$startYear = $currentYear - 4;

	$years = [];
	$counts = [];

	for ($year = $startYear; $year <= $currentYear; $year++) {
		$years[] = $year;
		$count = $users->firstWhere('year', $year)->count ?? 0;
		$counts[] = $count;
	}
@endphp

<script>
	const years = @json($years);
	const counts = @json($counts);
	const options = {
		chart: {
			height: "100%",
			maxWidth: "100%",
			type: "area",
			fontFamily: "Inter, sans-serif",
			dropShadow: {
				enabled: false,
			},
			toolbar: {
				show: false,
			},
		},
		tooltip: {
			enabled: true,
			x: {
				show: false,
			},
		},
		fill: {
			type: "gradient",
			gradient: {
				opacityFrom: 0.55,
				opacityTo: 0,
				shade: "#1C64F2",
				gradientToColors: ["#1C64F2"],
			},
		},
		dataLabels: {
			enabled: false,
		},
		stroke: {
			width: 6,
		},
		grid: {
			show: false,
			strokeDashArray: 4,
			padding: {
				left: 2,
				right: 2,
				top: 0,
			},
		},
		series: [
			{
				name: "Pengguna Baru",
				data: counts,
				color: "#1A56DB",
			},
		],
		xaxis: {
			categories: years,
			labels: {
				show: true,
			},
			axisBorder: {
				show: true,
			},
			axisTicks: {
				show: true,
			},
		},
		yaxis: {
			show: true,
		},
	};
	if (
		document.getElementById("area-chart") &&
		typeof ApexCharts !== "undefined"
	) {
		const chart = new ApexCharts(
			document.getElementById("area-chart"),
			options
		);
		chart.render();
	}
</script>

@php
	use App\Models\Resident;
	use App\Models\FamilyCard;
	use App\Models\SubDistrict;
	use App\Models\Neighborhoods;
	use App\Models\CommunityUnits;

	$residentCount = Resident::count();
	$familyCardCount = FamilyCard::count();
	$kelurahanCount = SubDistrict::count();
	$rtCount = Neighborhoods::count();
	$rwCount = CommunityUnits::count();

	$dataCounts = [
		'Penduduk' => $residentCount,
		'Kartu Keluarga' => $familyCardCount,
		'Kelurahan' => $kelurahanCount,
		'RT' => $rtCount,
		'RW' => $rwCount,
	];
@endphp

<script>
	const dataCounts = @json(array_values($dataCounts));
	const labels = @json(array_keys($dataCounts));
	let currentSeries = [...dataCounts];

	const getChartOptions = (series) => {
		return {
			series: series,
			colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694", "#Bf00FF"],
			chart: {
				height: 320,
				width: "100%",
				type: "donut",
			},
			stroke: {
				colors: ["transparent"],
				lineCap: "",
			},
			plotOptions: {
				pie: {
					donut: {
						labels: {
							show: true,
							name: {
								show: true,
								fontFamily: "Inter, sans-serif",
								offsetY: 20,
							},
							total: {
								showAlways: true,
								show: true,
								label: "Database",
								fontFamily: "Inter, sans-serif",
								formatter: function (w) {
									const sum = w.globals.seriesTotals.reduce((a, b) => {
										return a + b;
									}, 0);
									return sum + ' MB';
								},
							},
							value: {
								show: true,
								fontFamily: "Inter, sans-serif",
								offsetY: -20,
								formatter: function (value) {
									return value;
								},
							},
						},
						size: "80%",
					},
				},
			},
			grid: {
				padding: {
					top: -2,
				},
			},
			labels: labels,
			dataLabels: {
				enabled: false,
			},
			legend: {
				position: "bottom",
				fontFamily: "Inter, sans-serif",
			},
			yaxis: {
				labels: {
					formatter: function (value) {
						return value;
					},
				},
			},
			xaxis: {
				labels: {
					formatter: function (value) {
						return value;
					},
				},
				axisTicks: {
					show: false,
				},
				axisBorder: {
					show: false,
				},
			},
		};
	};

	if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
		const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions(currentSeries));
		chart.render();

		// Get all the checkboxes by their class name
		const checkboxes = document.querySelectorAll('#filters input[type="checkbox"]');

		// Function to handle the checkbox change event
		function handleCheckboxChange(event, chart) {
			const checkbox = event.target;
			const label = checkbox.value;
			const index = labels.indexOf(label);

			if (checkbox.checked) {
				currentSeries[index] = dataCounts[index];
			} else {
				currentSeries[index] = 0;
			}

			chart.updateSeries([...currentSeries]);
		}

		// Attach the event listener to each checkbox
		checkboxes.forEach((checkbox) => {
			checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
		});
	}
</script>
@endsection