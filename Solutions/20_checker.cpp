#include <cstdio>
#include <cstring>

using namespace std;

const int N = 5000005;
char s1[N], s2[N];

int main(int argc, char** argv) {
  FILE* fcorrect = fopen(argv[1], "r");
  FILE* fparticipant = fopen(argv[2], "r");
  if(fcorrect == 0 || fparticipant == 0) return 1;
  while(fscanf(fcorrect, "%s", s1) != EOF) {
    if(fscanf(fparticipant, "%s", s2) == EOF) return 1;
    if(strcmp(s1, s2) != 0) return 1;
  }
  fclose(fcorrect);
  fclose(fparticipant);
  return 0;
}
