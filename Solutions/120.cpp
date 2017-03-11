#include <iostream>
#include <cstdio>
using namespace std;
#define LIMIT 1000000
#define si(n) scanf("%d",&n)

int is_Comp[LIMIT+10]={0};

void seive(){
    is_Comp[0]=1;is_Comp[1]=1;
    for(int i=0;i<+LIMIT;i++)
        if(is_Comp[i]==0)
            for(int j=i+i;j<=LIMIT;j+=i)
                is_Comp[j]=1;
}

int main() {
	// your code goes here
	seive();
	int t;
	si(t);
	while(t--){
	    int n;
	    si(n);
	    if(is_Comp[n]==0)
	        printf("YES\n");
	    else
	        printf("NO\n");
	}
	return 0;
}
