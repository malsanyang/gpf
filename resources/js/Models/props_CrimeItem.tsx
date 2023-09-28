import CitizenListProps from "./props_CitizenItem";
import CriminalListProps from "./props_CriminalItem";
import UserListProps from "./props_UserItem";
import PoliceStationListProps from "./props_PoliceStationItem";
import CourtListProps from "./props_CourtItem";
import PrisonListProps from "./props_PrisonItem";

interface CrimeListProps {
    id: number;
    caseNumber: string;
    crimeType: string;
    location: string;
    description: string;
    status: string;
    witnessedBy: string;
    investigationReport: string;
    prosecutionReport: string;
    citizen: { data: CitizenListProps };
    court: { data: CourtListProps };
    criminal: { data: CriminalListProps };
    investigator: { data: UserListProps };
    policeOfficer: { data: UserListProps };
    policeStation: { data: PoliceStationListProps };
    prosecutor: { data: UserListProps };
    prison: { data: PrisonListProps };
}

export default CrimeListProps;
