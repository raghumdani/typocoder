#include "bits/stdc++.h"
using namespace std;

int a[15];
int main()
{
    int t;
    scanf("%d", &t);
    while( t-- )
    {
        int n;
        scanf("%d", &n);
        memset(a,0,sizeof(a));
        int i=0;
        while(n)
        {   a[i++]=n%10;
           n/=10;

	    }
	    sort(a,a+i);
	    map<int,int> megh;
	    do
	   {  n=0;
	      for(int j=0;j<i;j++)
	      {  n += ((j+1) * a[j]);
		  }
		 megh[n]++;
	   }while(next_permutation(a,a+i));
	   int meghans = 0;
	   for(auto it : megh)
        meghans=max(meghans,it.second);
       printf("%d\n", meghans);
    }
    return 0;
}
