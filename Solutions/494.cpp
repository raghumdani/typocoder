#include <bits/stdc++.h>
using namespace std;
int main()
{
    int i,j,n,a[10000],count=0;
    scanf("%d",&n);
    for(i=0;i<n;i++)
    {
        scanf("%d",&a[i]);
    }
    for(i=0;i<n;i++)
    {
        for(j=i+1;;j++)
        {
           if(j==n)
               j=0;
            if(j==n-1)
            {
              if(a[i]>a[j])
              {
                count++;
                 j=-1;
                 continue;
              }
              else 
              {
                  
                    count++;
                    j=-1;
                    break;
              }
            }
            if(a[i]>a[j])
            {
                 count++;
            }
            else
            {
                count++;
                break;
            }
        }
    }
    printf("%d",count);
	return 0;
}
