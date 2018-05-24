usage() { echo "Usage: $0 -i ilogin -f FirstName -l LastName " 1>&2; exit 1; }

while getopts ":i:f:l:" o; do
    case "${o}" in
        i)
            i=${OPTARG}
             ;;
        f)
            f=${OPTARG}
            ;;
        l)
            l=${OPTARG}
            ;;
    esac
done
shift $((OPTIND-1))

if [ -z "${i}" ] || [ -z "${f}" ] || [ -z "${l}" ]; then
    usage
fi

echo "ilogin = ${i}"
echo "firstName = ${f}"
echo "lastName = ${l}"

sqlite3 database/database.sqlite  "insert into sentries (login, first_name, last_name, email, feature, access_mode, created_at, updated_at) values ('${i}','${f}','${l}','${f}.${l}@eeas.europa.eu', '/ADMINISTRATOR','I',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)"

echo "Records in Sentry for ${i}"

sqlite3 database/database.sqlite "select login, first_name, last_name, email, feature, access_mode from sentries where login = '${i}'"

